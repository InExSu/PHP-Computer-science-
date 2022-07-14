```mermaid
stateDiagram-v2

s1: s1 explode(string $separator, string $string, int $limit = PHP_INT_MAX)
s2: s2 разбиение строки string,  <br/> используя separator разделителем
s3: s3 положительный
s4: s4 максимум limit элементов, при этом <br/> последний элемент будет содержать остаток строки string.
s5: s5 отрицательный
s6: s6 компоненты, кроме последних -limit
s69: s69 limit
s7: s7 limit = 0
s8: s8 limit = 1
s9: s9 separator 
s91: s91 пустая строка
s901: s901 в начале string
s902: s902 в конце string
s911: s911 пусто добавить в начало
s912: s912 пусто добавить в конец
s92: s92 не содержится в string и limit отрицательный
s93: s93 массив пустой
s94: s94 массив string
s10: s10 ValueError
s99: s99 массив
s100: s100 return

s1 --> s2
s69 --> s3
s3 --> s4
s69 --> s5
s5 --> s6
s2 --> s69
s69 --> s7
s7 --> s8
s8 --> s3
s2 --> s9
s9 --> s91
s91 --> s10
s10 --> s100
s9 --> s92
s92 --> s93: Да
s92 --> s94: Нет
s93 --> s99
s9 --> s901
s901 --> s911
s9 --> s902
s902 --> s912
s4 --> s99
s6 --> s99
s99 --> s100



