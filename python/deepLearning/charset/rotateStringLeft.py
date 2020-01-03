# noinspection PyUnresolvedReferences
def revertString(data,from1,to):
    while from1 < to:
        temp = data[from1]
        data[from1] = data[to]
        data[to] = temp
        from1 += 1
        to -= 1

if __name__ == "__main__":
    data1 = list('2faefw')

    revertString(data1, 1, 3)
    print(data1)