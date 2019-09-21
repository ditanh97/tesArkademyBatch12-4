def fibonacci(n):
    #source: https://kitablog.net/2017/10/menghitung-deret-fibonacci-dan-bilangan-ke-n-dengan-python/
    if (n==1 or n ==0):
        return n
    else:
        return fibonacci(n-1)+fibonacci(n-2)


def fibo(col,row):
    n = col * row
    a = ''
    fib = []
    for f in range(n):
        # print(f)
        fib.append(fibonacci(f))
        a += str(fib[f])+","
        if len(fib) % col == 0:
            a += "\n"
    print(a)


fibo(4,3)
