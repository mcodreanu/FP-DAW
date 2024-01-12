using System;

namespace Ejercicios
{
    class Program
    {
        public static bool Ejer01 (int[,] numeros)
        {
            int sumaFila = 0;

            for (int i = 0; i < numeros.GetLength(1); i++)
            {
                sumaFila += numeros[0, i];
            }

            for (int i = 1; i < numeros.GetLength(0); i++)
            {
                int sumaFilaActual = 0;

                for (int j = 0; j < numeros.GetLength(1); j++)
                {
                    sumaFilaActual += numeros[i, j];
                }

                if (sumaFilaActual != sumaFila)
                {
                    return false;
                }
            }

            return true;
        }

        public static int Ejer02 (int[,] numeros)
        {
            int indiceMayorSuma = 0;
            int mayorSuma = 0;

            for (int i = 0; i < numeros.GetLength(0); i++)
            {
                int sumaFila = 0;
                for (int j = 0; j < numeros.GetLength(1); j++)
                {
                    sumaFila += numeros[i, j];
                }

                if (sumaFila > mayorSuma)
                {
                    mayorSuma = sumaFila;
                    indiceMayorSuma = i;
                }
            }

            return indiceMayorSuma;
        }

        public static bool Ejer03 (int[,] numeros, List<int> enteros)
        {
            foreach (int numero in numeros)
            {
                if (!enteros.Contains(numero))
                {
                    return false;
                }
            }

            return true;
        }

        static void Main(string[] args)
        {
            int[,] numeros = new int[,]
            {
                {1,2,3},
                {4,5,6},
                {7,8,9}
            };

            List<int> enteros = new List<int> {1,3,5,7,9};

            Console.WriteLine("Ejercicio 1: " + Ejer01(numeros));
            Console.WriteLine("Ejercicio 2: " + Ejer02(numeros));
            Console.WriteLine("Ejercicio 3: " + Ejer03(numeros, enteros));
        }
    }
}