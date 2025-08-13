import pymysql
from datetime import datetime

'''
查询country表里的country_code字段，生成address-all-countries.xml文件
'''

# 数据库配置
db_config = {
    'host': 'localhost',
    'user': 'root',
    'password': 'hello1234',
    'database': 'randomlocker',
    'charset': 'utf8mb4',
    'cursorclass': pymysql.cursors.DictCursor
}

def generate_other_countries_xml():
    try:
        # 连接数据库
        connection = pymysql.connect(**db_config)
        
        try:
            with connection.cursor() as cursor:
                sql = "SELECT `country_code` FROM `country`"
                cursor.execute(sql)
                results = cursor.fetchall()
                
                # 准备XML内容
                xml_header = '<?xml version="1.0" encoding="UTF-8"?>\n'
                xml_header += '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">\n'
                
                # 获取当前时间作为lastmod（也可以固定为指定时间）
                lastmod = datetime.now().strftime("%Y-%m-%dT%H:%M:%SZ")
                # 如果需要固定为示例中的时间，可以使用下面这行
                # lastmod = "2025-06-20T20:57:08Z"
                
                xml_body = ""
                for row in results:
                    country_code = row['country_code']
                    # 确保国家编码为小写
                    country_code_lower = country_code.lower()
                    xml_body += f'\t<url>\n'
                    xml_body += f'\t\t<loc>https://www.randomaddress.com/random-address-generator/{country_code_lower}</loc>\n'
                    xml_body += f'\t\t<lastmod>{lastmod}</lastmod>\n'
                    xml_body += f'\t\t<priority>1.0</priority>\n'
                    xml_body += f'\t</url>\n'
                
                xml_footer = '</urlset>'
                
                # 组合完整XML内容
                xml_content = xml_header + xml_body + xml_footer
                
                # 写入文件
                with open('address-all-countries.xml', 'w', encoding='utf-8') as f:
                    f.write(xml_content)
                
                print(f"成功生成other-countries.xml文件，包含{len(results)}个国家")
                
        finally:
            connection.close()
            
    except Exception as e:
        print(f"发生错误: {str(e)}")

if __name__ == "__main__":
    generate_other_countries_xml()
