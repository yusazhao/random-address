import pymysql
from collections import defaultdict

'''
脚本功能：
1. 数据查询：
     从 country_state 表查询所有不同的 state 值
     从 address 表查询所有不同的 state 值
2. 数据比较（country_state.country == address.country）：
     在country_state表中有，但address表中没有的state
'''

'''
脏数据
=== 国家: United States ===
  仅在 country_state 存在的州 (1个):
    - Montana
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
            # 1. 从 country_state 表获取所有 (国家, 州) 数据
            cursor.execute("""
                SELECT country, state 
                FROM country_state 
                WHERE country IS NOT NULL AND state IS NOT NULL
            """)
            country_state_data = cursor.fetchall()

            # 2. 从 address 表获取所有 (国家, 州) 数据
            cursor.execute("""
                SELECT country, state 
                FROM address 
                WHERE country IS NOT NULL AND state IS NOT NULL
            """)
            address_data = cursor.fetchall()

            # 3. 按国家分组整理数据
            # 结构: {国家: {'cs_states': 州集合, 'addr_states': 州集合}}
            country_dict = defaultdict(lambda: {'cs_states': set(), 'addr_states': set()})

            # 填充 country_state 数据
            for row in country_state_data:
                country = row['country'].strip()
                state = row['state'].strip()
                country_dict[country]['cs_states'].add(state)

            # 填充 address 数据
            for row in address_data:
                country = row['country'].strip()
                state = row['state'].strip()
                country_dict[country]['addr_states'].add(state)

            # 4. 分析并输出结果（只输出country_state有而address没有的州）
            for country, data in country_dict.items():
                cs_states = data['cs_states']
                addr_states = data['addr_states']

                # 仅计算：在country_state里有，在address里没有的state
                only_in_cs = cs_states - addr_states

                # 只输出有差异的国家
                if only_in_cs:
                    print(f"=== 国家: {country} ===")
                    print(f"  在country_state中存在，但在address中不存在的州 ({len(only_in_cs)}个):")
                    for state in sorted(only_in_cs):
                        print(f"    - {state}")
                    print()  # 空行分隔不同国家

    except pymysql.MySQLError as e:
        print(f"数据库错误: {e}")
    except Exception as e:
        print(f"程序错误: {e}")
    finally:
        if 'connection' in locals() and connection.open:
            connection.close()
            print("数据库连接已关闭")

if __name__ == "__main__":
    main()