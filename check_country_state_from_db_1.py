#!/usr/bin/env python3
# -*- coding: utf-8 -*-

import pymysql

'''
脚本功能：
1. 数据查询：
     从 country_state 表查询所有不同的 country 值
     从 country 表查询所有不同的 country 值
2. 数据比较：
     在country_state表中有，但country表中没有的国家
     在country表中有，但country_state表中没有的国家
     两个表共同拥有的国家
'''

def get_country_state_countries():
    """
    从country_state表中获取所有distinct的country
    返回country集合
    """
    countries = set()
    
    try:
        connection = pymysql.connect(
            host='localhost',
            user='root',
            password='hello1234',
            database='randomlocker',
            charset='utf8mb4',
            cursorclass=pymysql.cursors.DictCursor
        )
        
        with connection:
            with connection.cursor() as cursor:
                sql = "SELECT DISTINCT country FROM country_state WHERE country IS NOT NULL AND country != ''"
                cursor.execute(sql)
                results = cursor.fetchall()
                
                for row in results:
                    country = row['country']
                    if country:
                        countries.add(country.strip())
                
        return countries
        
    except Exception as e:
        print(f"查询country_state表时发生错误: {e}")
        return countries

def get_country_table_countries():
    """
    从country表中获取所有的country
    返回country集合
    """
    countries = set()
    
    try:
        connection = pymysql.connect(
            host='localhost',
            user='root',
            password='hello1234',
            database='randomlocker',
            charset='utf8mb4',
            cursorclass=pymysql.cursors.DictCursor
        )
        
        with connection:
            with connection.cursor() as cursor:
                # 假设country表有country字段，如果字段名不同请修改
                sql = "SELECT DISTINCT country FROM country WHERE country IS NOT NULL AND country != ''"
                cursor.execute(sql)
                results = cursor.fetchall()
                
                for row in results:
                    country = row['country']
                    if country:
                        countries.add(country.strip())
                
        return countries
        
    except Exception as e:
        print(f"查询country表时发生错误: {e}")
        return countries

def compare_countries():
    """
    比较country_state表和country表中的国家数据
    """
    print("Country_State vs Country 表比较器")
    print("=" * 80)
    
    # 获取country_state表中的country
    print("正在查询 country_state 表...")
    country_state_countries = get_country_state_countries()
    print(f"country_state 表中找到 {len(country_state_countries)} 个国家")
    
    # 获取country表中的country
    print("正在查询 country 表...")
    country_table_countries = get_country_table_countries()
    print(f"country 表中找到 {len(country_table_countries)} 个国家")
    
    # 找出在country_state表中但不在country表中的国家
    in_country_state_not_in_country = country_state_countries - country_table_countries
    
    # 找出在country表中但不在country_state表中的国家
    in_country_not_in_country_state = country_table_countries - country_state_countries
    
    print("\n" + "=" * 80)
    print("统计信息:")
    print("-" * 80)
    print(f"country_state 表中的国家数量:   {len(country_state_countries)} 个")
    print(f"country 表中的国家数量:         {len(country_table_countries)} 个")
    print(f"两者共同拥有的国家:             {len(country_state_countries & country_table_countries)} 个")
    print(f"仅在 country_state 表中的国家:  {len(in_country_state_not_in_country)} 个")
    print(f"仅在 country 表中的国家:        {len(in_country_not_in_country_state)} 个")
    
    print("\n" + "=" * 80)
    print("在 country_state 表中存在，但在 country 表中不存在的国家:")
    print("-" * 80)
    
    if in_country_state_not_in_country:
        for i, country in enumerate(sorted(in_country_state_not_in_country), 1):
            print(f"{i:3d}. {country}")
        print("-" * 80)
        print(f"总计: {len(in_country_state_not_in_country)} 个国家")
    else:
        print("没有发现这种情况的国家！")
    
    print("\n" + "=" * 80)
    print("在 country 表中存在，但在 country_state 表中不存在的国家:")
    print("-" * 80)
    
    if in_country_not_in_country_state:
        for i, country in enumerate(sorted(in_country_not_in_country_state), 1):
            print(f"{i:3d}. {country}")
        print("-" * 80)
        print(f"总计: {len(in_country_not_in_country_state)} 个国家")
    else:
        print("没有发现这种情况的国家！")
    
    print("\n" + "=" * 80)
    print("两个表中共同存在的国家:")
    print("-" * 80)
    common_countries = country_state_countries & country_table_countries
    if common_countries:
        for i, country in enumerate(sorted(common_countries), 1):
            print(f"{i:3d}. {country}")
        print("-" * 80)
        print(f"总计: {len(common_countries)} 个国家")
    else:
        print("没有共同的国家！")

if __name__ == "__main__":
    compare_countries()
