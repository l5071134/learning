--
-- Created by IntelliJ IDEA.
-- User: Macintosh
-- Date: 2020-03-25
-- Time: 23:39
-- To change this template use File | Settings | File Templates.
--

print(type("test"))
print(type(10))
print(type(1.2))
print(type(print))
print(type(asd))
print(type(nil))


tab1 = {key1="val1", key2="val2"}

print(tab1)
print(tab1.key1)


html = [[
   <p> test multi string </p>
]]

print(html)
print(#html)


config = {hello="hello",world="world"}
config.words = "hellow"
config.num = 100
config["name"] = "zhangsan"

for key , val in pairs (config) do
    print(key,val)
end
