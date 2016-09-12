
>XML
>可扩展标记语言

- 使用`<![CDATA[text]]>`处理特殊内容
```
<?xml version='1.0' encoding='utf-8' standalone='no' ?>
<stu>
    <people>
        <name>wsq</name>
        <addr>
            <![CDATA[
                    <a href="#">address</a>
                ]]>
        </addr>
    </people>
</stu>
```
- 使用DTD约束xml文件


----------


DTD基本语法`<!ELEMENT 元素 内容>`

|	内容	|	EMPTY	|	ANY	|	#PCDATA		|
| --------  | :-----:   |  :-----:  | :-----:  |
|     | 不能有子元素与文本 |   能有定义的元素与文本     |可包含文本，不能有子元素	|

```
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE class[
<!ELEMENT class EMPTY>
]>
<class></class>
```

```
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE class[
<!ELEMENT class ANY>
<!ELEMENT student (name)>
<!ELEMENT name (#PCDATA)>
]>
<!--
<class>
</class>
-->
<class>
<student><name>q</name></student>
<name></name>
</class>
```

----------


	外部dtd文档 <!DOCTYPE 根元素 SYSTEM "DTD路径">

```
<!--demo.dtd-->

<?xml version="1.0" encoding="UTF-8"?>
<!ELEMENT class (student+)>
<!ELEMENT student (name,age,hobby+)>
<!ELEMENT name (#PCDATA)>
<!ELEMENT age (#PCDATA)>
<!ELEMENT hobby (#PCDATA)>

<!--demo.xml-->
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE class SYSTEM "D:\phpStudy\WWW\app\xml\dtd\demo.dtd">
<class>
	<student>
		<name>lig</name>
		<age>18</age>
		<hobby>reading</hobby>
	</student>
</class>
```
	内部DTD文档 <!DOCTYPE 根元素[内容]>

```
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE class[
<!ELEMENT class (student+)>
<!ELEMENT student (name,age,hobby+)>
<!ELEMENT name (#PCDATA)>
<!ELEMENT age (#PCDATA)>
<!ELEMENT hobby (#PCDATA)>
]>
<class>
	<student>
		<name></name>
		<age></age>
		<hobby></hobby>
	</student>
</class>

<!--hybrid-->
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html[
<!ELEMENT html (body)>
<!ELEMENT body (#PCDATA|p)*>
<!ELEMENT p (#PCDATA)>
]>
<html>
	<body>
		document<p>ligbee</p>
	</body>
</html>
```
	内外部DTD结合 <!DOCTYPE 根元素 SYSTEM "DTD路径"[]>
```
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE roster SYSTEM "ch.dtd"[
<!ENTITY per "student">
]>
```
	引入公开的DTD（比如W3C制定的标准）<!DOCTYPE 文档根节点 PUBLIC "DTD名称" "url">
```
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
```
DTD缺点：

 1. 不支持命名空间 
 2. 支持数据类型少 
 3. 不可扩展 
 4. 不遵循XML规范 

 可用schema弥补，不简洁
 


----------
 -  元素属性
语法 `<!ATTLIST 元素名称 属性名称 属性类型 属性特点>`
| 属性类型       | 说明   |  属性特点  | 说明   |
| --------   | :-----:  | :-----:| :----:  |
| CDATA     | 属性值可为字符或者数字 |  \#REQUIRED     |  必有属性    |
| ID       |   属性值唯一，字母开头   |   \#IMPLIED  |  可有可无     |
| IDREF/IDREFS        |    id引用   |  \#FIXED VALUE  |  固定值   |
| Enumenated        |    枚举   |  （DEFAULT） VALUE  |  默认值     |
| ENTITY/ENTITIES        |    实体   |     |        |

```
<?xml version="1.0" encoding="UTF-8"?>
<!ELEMENT book (name)>
<!ELEMENT name (#PCDATA)>
<!ATTLIST book 
id ID #REQUIRED
medium CDATA #FIXED "纸质"
type CDATA  "计算机"
pub CDATA #REQUIRED
pagesize CDATA #IMPLIED
>
<!ATTLIST name language (english|chinese)  "english">

<!--demo-->
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE book SYSTEM "D:\phpStudy\WWW\app\xml\attlist\attlist.dtd">
<book id="iso" pub="" medium="纸质" type="计算机" pagesize="">
	<name language="chinese"></name>
</book>

```
- 实体
	
	预定义实体
|实体|符号|
| --------   | :-----  |
|`&lt;`|<|
|`&gt;`|>|
|`&amp;`|&|
|`&apos;`|'|
|`&quot;`|"|
|||
引用实体	`<!ENTITY str "">`

```
<?xml version="1.0" encoding="UTF-8"?>
<!ELEMENT class (student+)>
<!ELEMENT student (name,age)>
<!ELEMENT name (#PCDATA)>
<!ELEMENT age (#PCDATA)>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE class SYSTEM ".\demo.dtd"[
<!ENTITY age "18">
]>
<class>
	<student>
		<name>lig</name>
		<age>&age;</age>
	</student>
	<student>
		<name>bee</name>
		<age>&age;</age>
	</student>
</class>

```
参数实体 `<!ENTITY % str "">`

```
<?xml version="1.0" encoding="UTF-8"?>
<!ENTITY % p "teacher">
<!ELEMENT roster ((%p;)+)>
<!ELEMENT %p; (name)>
<!ELEMENT name (#PCDATA)>

<!--stu.xml-->
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE roster SYSTEM ".\attlist_ch.dtd"[
<!ENTITY % p "student">
]>
<roster>
	<student>
		<name></name>
	</student>
</roster>

<!--tea.xml-->
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE roster SYSTEM ".\attlist_ch.dtd"[
<!ENTITY % p "teacher">
]>
<roster>
	<teacher>
		<name></name>
	</teacher>
</roster>

```