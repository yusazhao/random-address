import pymysql


'''
执行select state_code,city_slug from country_city where LOWER(`country_code`) = 'us' order by pop desc limit 23 这条sql，生成address-us-major-cities.xml文件
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

def generate_us_major_cities_xml():
    try:
        # 连接数据库
        connection = pymysql.connect(**db_config)
        
        try:
            with connection.cursor() as cursor:
                # 执行查询：美国的城市，按人口降序排列，取前23个
                sql = """
                SELECT state_code, city_slug 
                FROM country_city 
                WHERE LOWER(`country_code`) = 'us' 
                ORDER BY pop DESC 
                LIMIT 23
                """
                cursor.execute(sql)
                results = cursor.fetchall()
                
                # 准备XML内容
                xml_header = '<?xml version="1.0" encoding="UTF-8"?>\n'
                xml_header += '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">\n'
                
                # 固定的lastmod时间
                lastmod = "2025-06-20T20:57:08Z"
                # 美国的国家编码固定为us（小写）
                country_code = "us"
                
                xml_body = ""
                for row in results:
                    # 确保州编码为小写
                    state_code = row['state_code'].lower()
                    # city_slug直接使用（假设已符合要求）
                    city_slug = row['city_slug']
                    
                    xml_body += f'\t<url>\n'
                    xml_body += f'\t\t<loc>https://www.randomaddress.com/random-address-generator/{country_code}-{state_code}/{city_slug}</loc>\n'
                    xml_body += f'\t\t<lastmod>{lastmod}</lastmod>\n'
                    xml_body += f'\t\t<priority>1.0</priority>\n'
                    xml_body += f'\t</url>\n'
                
                xml_footer = '</urlset>'
                
                # 组合完整XML内容
                xml_content = xml_header + xml_body + xml_footer
                
                # 写入文件
                with open('address-us-major-cities.xml', 'w', encoding='utf-8') as f:
                    f.write(xml_content)
                
                print(f"成功生成address-us-major-cities.xml文件，包含{len(results)}个美国主要城市")
                
        finally:
            connection.close()
            
    except Exception as e:
        print(f"发生错误: {str(e)}")

if __name__ == "__main__":
    generate_us_major_cities_xml()
    