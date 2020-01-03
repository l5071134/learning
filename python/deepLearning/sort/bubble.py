# coding:utf-8

""" 冒泡排序 """
def bubble_sort(alist):
   n = len(alist)

   for j in range(n - 1,0,-1):
    print(j)
    for i in range(0, j):
       if alist[i] > alist[i + 1]:
           alist[i], alist[i + 1] = alist[i + 1], alist[i]

if __name__ == "__main__":
    li = [2,34,5,3,1,10]
    print(li)
    bubble_sort(li)
    print(li)