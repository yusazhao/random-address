#!/usr/bin/env python3
# -*- coding: utf-8 -*-

import xml.etree.ElementTree as ET
import os
import pymysql

def get_sitemap_country_codes():
    """
    读取sitemap.xml文件，提取所有country_code（从文件名中提取）
    返回country_code集合
    """
    current_dir = os.path.dirname(os.path.abspath(__file__))
    sitemap_path = os.path.join(current_dir, 'sitemap.xml')
    
    sitemap_codes = set()
    
    try:
        if not os.path.exists(sitemap_path):
            print(f"错误: 未找到文件 {sitemap_path}")
            return sitemap_codes
        
        tree = ET.parse(sitemap_path)
        root = tree.getroot()
        
        namespace = {'ns': 'http://www.sitemaps.org/schemas/sitemap/0.9'}
        loc_elements = root.findall('.//ns:loc', namespace)
        
        if not loc_elements:
            loc_elements = root.findall('.//loc')
        
        for loc in loc_elements:
            url = loc.text.strip() if loc.text else ""
            if url.startswith('http://') or url.startswith('https://'):
                parts = url.split('/', 3)
                if len(parts) > 3:
                    filename = parts[3]  # 获取文件名
                    if filename.endswith('.xml'):
                        country_code = filename[:-4].lower()  # 去掉.xml后缀并转小写
                        sitemap_codes.add(country_code)
        
        return sitemap_codes
        
    except Exception as e:
        print(f"读取sitemap.xml时发生错误: {e}")
        return sitemap_codes

def get_database_country_codes():
    """
    连接数据库，查询address表中的所有distinct country_code
    返回country_code集合（小写）
    """
    db_codes = set()
    
    try:
        # 数据库连接配置
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
                # 查询所有distinct的country_code
                sql = "SELECT DISTINCT LOWER(country_code) as country_code FROM address WHERE country_code IS NOT NULL AND country_code != ''"
                cursor.execute(sql)
                results = cursor.fetchall()
                
                for row in results:
                    country_code = row['country_code']
                    if country_code:
                        db_codes.add(country_code)
                
        return db_codes
        
    except Exception as e:
        print(f"数据库查询时发生错误: {e}")
        return db_codes

def read_sitemap_urls():
    """
    读取同级目录下的 sitemap.xml 文件，提取所有 loc 节点的值并打印输出
    """
    
    # 获取当前脚本所在目录
    current_dir = os.path.dirname(os.path.abspath(__file__))
    sitemap_path = os.path.join(current_dir, 'sitemap.xml')
    
    try:
        # 检查文件是否存在
        if not os.path.exists(sitemap_path):
            print(f"错误: 未找到文件 {sitemap_path}")
            return
        
        # 解析XML文件
        tree = ET.parse(sitemap_path)
        root = tree.getroot()
        
        # 定义命名空间（sitemap通常使用这个命名空间）
        namespace = {'ns': 'http://www.sitemaps.org/schemas/sitemap/0.9'}
        
        # 查找所有的 loc 元素
        loc_elements = root.findall('.//ns:loc', namespace)
        
        # 如果没有找到命名空间的loc，尝试不使用命名空间
        if not loc_elements:
            loc_elements = root.findall('.//loc')
        
        print(f"找到 {len(loc_elements)} 个URL:")
        print("-" * 60)
        
        # 提取并打印所有URL（去掉域名部分）
        for i, loc in enumerate(loc_elements, 1):
            url = loc.text.strip() if loc.text else ""
            # 去掉域名和开头的斜杠，只保留文件名/路径
            if url.startswith('http://') or url.startswith('https://'):
                # 找到第三个斜杠的位置（协议://域名/路径）
                parts = url.split('/', 3)
                if len(parts) > 3:
                    path = parts[3]  # 去掉开头的斜杠
                else:
                    path = ''  # 如果没有路径，显示空
            else:
                path = url.lstrip('/')  # 如果不是完整URL，也去掉开头的斜杠
            
            print(f"{i:3d}. {path}")
        
        print("-" * 60)
        print(f"总计: {len(loc_elements)} 个URL")
        
    except ET.ParseError as e:
        print(f"XML解析错误: {e}")
    except FileNotFoundError:
        print(f"文件未找到: {sitemap_path}")
    except Exception as e:
        print(f"发生错误: {e}")

def compare_country_codes():
    """
    比较数据库和sitemap中的country_code，找出缺失的国家代码
    """
    print("Country Code 比较器")
    print("=" * 60)
    
    # 获取sitemap中的country_code
    print("正在读取 sitemap.xml...")
    sitemap_codes = get_sitemap_country_codes()
    print(f"sitemap.xml 中找到 {len(sitemap_codes)} 个国家")
    
    # 获取数据库中的country_code
    print("正在查询数据库...")
    db_codes = get_database_country_codes()
    print(f"数据库中找到 {len(db_codes)} 个国家")
    
    print("\n" + "=" * 60)
    print("统计信息:")
    print("-" * 60)
    print(f"数据库中的国家数量:     {len(db_codes)} 个")
    print(f"sitemap.xml中的国家数量: {len(sitemap_codes)} 个")
    print(f"两者共同拥有的国家:     {len(db_codes & sitemap_codes)} 个")
    print(f"数据库独有的国家:       {len(db_codes - sitemap_codes)} 个")
    print(f"sitemap独有的国家:      {len(sitemap_codes - db_codes)} 个")
    
    # 找出数据库中有但sitemap中没有的country_code
    missing_in_sitemap = db_codes - sitemap_codes
    
    print("\n" + "=" * 60)
    print("数据库中存在但sitemap.xml中缺失的国家代码:")
    print("-" * 60)
    
    if missing_in_sitemap:
        for i, code in enumerate(sorted(missing_in_sitemap), 1):
            print(f"{i:3d}. {code}.xml")
        print("-" * 60)
        print(f"总计缺失: {len(missing_in_sitemap)} 个国家代码")
    else:
        print("没有缺失的国家代码，所有数据库中的country_code都在sitemap.xml中存在！")
    
    print("\n" + "=" * 60)
    print("sitemap.xml 中的所有国家代码:")
    print("-" * 60)
    for i, code in enumerate(sorted(sitemap_codes), 1):
        print(f"{i:3d}. {code}.xml")

if __name__ == "__main__":
    compare_country_codes()
    
    print("\n\n" + "=" * 60)
    print("以下是原始sitemap URL列表:")
    print("=" * 60)
    read_sitemap_urls()
