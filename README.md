Purecms framework
===


## Microdata usage
```php
$Microdata = new Rataja\pfcms\Microdata();
$Microdata->setName('Some product name');
$Microdata->setImage('--- cesta k img ---');
$Microdata->setDescription('Desc');
$Microdata->setBrand('Some brand');
$Microdata->setUrl('https://www.fullproducturl');
$Microdata->setAggregateRating(5, 2, 4.8);
$Microdata->setOffers(2799, 'CZK');
$Microdata->setPriceValidUntil('2030-12-31');
$Microdata->getScript();
```
