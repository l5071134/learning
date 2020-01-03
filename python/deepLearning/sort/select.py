# coding:utf-8

def select_sort(alist):
    n = len(alist)
    print(n)
    for i in range(0 , n  ):
        min = i
        for j in range(i, n ):
            if alist[min] > alist[j]:
                min = j
        print(i , j,min,n)
        if min != i:
            alist[i], alist[min] = alist[min], alist[i]



if __name__ == "__main__":
    alist = [9,3,2,5,1,6,30,12]
    print(alist)
    select_sort(alist)
    print(alist)