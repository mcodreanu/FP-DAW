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

    static void Main(string[] args)
    {
        Console.WriteLine("Hello, World!");

        for (long i = 2; i <= 20; i = i + 2)
        {
            Console.WriteLine(Factorial(i));
        } 
        
    }
}