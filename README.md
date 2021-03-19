# Penoplavaan
## _World Bank Calculator_
 

Краткое описание сильных и слабых сторон решения.
_Стек технологий:_
- HTML via Bootstrap 
- SCSS
- Pure JS + jQuery
- Pure PHP
## Что не получилось

- Кривая адаптивная вёрстка, я в ней не слишком силён
- Не соблюдены некоторые пропорции и цвета 
- Небольшие расхождения с источником (ниже)
- GitHub Pages не поддерживает PHP-запросы, сайт перенесён на личный хостинг [livebook]

## Дополнительная информация

Часть кода, а именно - формула подсчёта процентов была изменена:


```sh
summn = summn-1 + (summn-1 + summadd)daysn(percent / daysy)
```

Была изменена на это:

```sh
summn = summn-1 + summadd + (summn-1 + summadd)daysn(percent / daysy) 
```

## Ресурсы

Для проверки подсчётов использовался  [источник][fin]

  

 

   [fin]: <https://vashifinancy.ru/finansovye-kalkulyatory/kalkulyator-vklada-s-kapitalizatziey-protzentov/>
   [livebook]: <https://livebook72.ru/worldbankcalc/>
    
