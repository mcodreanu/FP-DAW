using System.Globalization;

namespace MyProject;

class Program
{

    public static long Factorial(long x)
    {
        long res = -1;
        if (x==0)
            res = 1;
        else
        {
            if (x>0)
            {
                res = x;
                while (x>1)
                {
                    res = res * (x-1);
                    x--;
                }
            }
            else
            {
                throw new Exception("error");
            }
        }
        return res;
    }

    public static void f(int x)
    {
        int contador = 0;
        int numero = 2;

        while (contador < x)
        {
            Console.WriteLine(Factorial(numero));
            numero += 2;
            contador++;
        }
    }

    static void Main(string[] args)
    {
        Console.WriteLine("Hello, World!"); 
        f(10);
        
    }
}