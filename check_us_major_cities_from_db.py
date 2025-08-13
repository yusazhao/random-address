import pymysql

'''
脚本功能：
1. 数据查询：
     SELECT state_code, city_slug 
                FROM country_city 
                WHERE LOWER(`country_code`) = 'us' 
                ORDER BY pop DESC 
                LIMIT 23
2. 数据比较
     通过 country_city 表里的country_code，state_code 和 city_slug 作为where条件，看address表中没有记录
'''

def main():
    # 数据库连接配置
    db_config = {
        'host': 'localhost',
        'user': 'root',
        'password': 'hello1234',
        'database': 'randomlocker',
        'charset': 'utf8mb4',
        'cursorclass': pymysql.cursors.DictCursor
    }

    try:
        # 建立数据库连接
        connection = pymysql.connect(** db_config)
        print("数据库连接成功！\n")

        with connection.cursor() as cursor:
            # 1. 从country_city表查询美国前23个人口最多的城市
            print("正在从country_city表查询数据...")
            cursor.execute("""
                SELECT state_code, city_slug 
                FROM country_city 
                WHERE LOWER(`country_code`) = 'us' 
                ORDER BY pop DESC 
                LIMIT 23
            """)
            city_data = cursor.fetchall()
            print(f"成功获取{len(city_data)}条城市数据\n")

            # 2. 逐个比对address表中是否存在对应记录
            missing_records = []
            country_code = 'us'  # 固定为美国

            for idx, city in enumerate(city_data, 1):
                state_code = city['state_code']
                city_slug = city['city_slug']
                
                # 查询address表中是否存在匹配记录
                cursor.execute("""
                    SELECT COUNT(*) AS count 
                    FROM address 
                    WHERE LOWER(`country_code`) = %s 
                      AND `state_code` = %s 
                      AND `city_slug` = %s
                """, (country_code, state_code, city_slug))
                
                result = cursor.fetchone()
                if result['count'] == 0:
                    missing_records.append({
                        'state_code': state_code,
                        'city_slug': city_slug
                    })
                    print(f"[{idx}/{len(city_data)}] 未找到 - {state_code} | {city_slug}")
                else:
                    print(f"[{idx}/{len(city_data)}] 已找到 - {state_code} | {city_slug}")

            # 3. 输出比对结果
            print("\n=== 比对结果 ===")
            if missing_records:
                print(f"在address表中未找到的记录共{len(missing_records)}条：")
                for item in missing_records:
                    print(f"- state_code: {item['state_code']}, city_slug: {item['city_slug']}")
            else:
                print("所有城市在address表中均存在对应记录")

    except pymysql.MySQLError as e:
        print(f"数据库错误: {e}")
    except Exception as e:
        print(f"程序错误: {e}")
    finally:
        if 'connection' in locals() and connection.open:
            connection.close()
            print("\n数据库连接已关闭")

if __name__ == "__main__":
    main()