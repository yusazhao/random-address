import pymysql

'''
查询country_state表里的state_code字段，生成address-us-all-states.xml文件
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

def generate_us_states_xml():
    try:
        # 连接数据库
        connection = pymysql.connect(** db_config)
        
        try:
            with connection.cursor() as cursor:
                # 查询美国的所有州编码，将country_code转换为小写进行条件判断
                sql = """
                SELECT `country_code`, `state_code` 
                FROM `country_state` 
                WHERE LOWER(`country_code`) = 'us'
                """
                cursor.execute(sql)
                results = cursor.fetchall()
                
                # 准备XML内容
                xml_header = '<?xml version="1.0" encoding="UTF-8"?>\n'
                xml_header += '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">\n'
                
                # 固定的lastmod时间
                lastmod = "2025-06-20T20:57:08Z"
                
                xml_body = ""
                for row in results:
                    # 确保国家编码和州编码都是小写
                    country_code = row['country_code'].lower()
                    state_code = row['state_code'].lower()
                    
                    xml_body += f'\t<url>\n'
                    xml_body += f'\t\t<loc>https://www.randomaddress.com/random-address-generator/{country_code}-{state_code}</loc>\n'
                    xml_body += f'\t\t<lastmod>{lastmod}</lastmod>\n'
                    xml_body += f'\t\t<priority>1.0</priority>\n'
                    xml_body += f'\t</url>\n'
                
                xml_footer = '</urlset>'
                
                # 组合完整XML内容
                xml_content = xml_header + xml_body + xml_footer
                
                # 写入文件
                with open('address-us-all-states.xml', 'w', encoding='utf-8') as f:
                    f.write(xml_content)
                
                print(f"成功生成address-us-all-states.xml文件，包含{len(results)}个美国州")
                
        finally:
            connection.close()
            
    except Exception as e:
        print(f"发生错误: {str(e)}")

if __name__ == "__main__":
    generate_us_states_xml()
    