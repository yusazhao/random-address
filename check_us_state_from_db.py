import pymysql
from collections import defaultdict

'''
脚本功能：
1. 数据查询：
     从 country_state 表中 distinct(state_code )，WHERE LOWER(`country_code`) = 'us' 
     从 address 表中 distinct(state_code )，WHERE LOWER(`country_code`) = 'us' 
2. 数据比较
     在country_state表中有，但address表中没有的state_code
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
        connection = pymysql.connect(**db_config)
        print("数据库连接成功！\n")

        with connection.cursor() as cursor:
            # 1. 从 country_state 表获取美国的 distinct(state_code)
            cursor.execute("""
                SELECT DISTINCT state_code 
                FROM country_state 
                WHERE LOWER(`country_code`) = 'us' 
                  AND state_code IS NOT NULL
            """)
            cs_state_codes = {row['state_code'].strip() for row in cursor.fetchall()}

            # 2. 从 address 表获取美国的 distinct(state_code)
            cursor.execute("""
                SELECT DISTINCT state_code 
                FROM address 
                WHERE LOWER(`country_code`) = 'us' 
                  AND state_code IS NOT NULL
            """)
            addr_state_codes = {row['state_code'].strip() for row in cursor.fetchall()}

            # 3. 计算差异：country_state有而address没有的state_code
            only_in_cs = cs_state_codes - addr_state_codes

            # 4. 输出结果
            print("=== 美国（country_code='us'）州编码差异分析 ===")
            if only_in_cs:
                print(f"在 country_state 表中存在，但在 address 表中不存在的 state_code 共 {len(only_in_cs)} 个：")
                for code in sorted(only_in_cs):
                    print(f"  - {code}")
            else:
                print("country_state 表中的所有 state_code 在 address 表中均存在，无差异")

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