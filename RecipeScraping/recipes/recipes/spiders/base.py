from scrapy.spider import BaseSpider
from scrapy.selector import HtmlXPathSelector

from recipes.items import RecipesItem

class RecipeComSpider(BaseSpider):
    name = "basestar"
    allowed_domains = ['recipe.com']
    start_urls = [
                  "http://www.recipe.com/cheesy-italian-meatball-casserole/",
                  "http://www.recipe.com/green-goddess-dip/" 
                  ]

    def parse(self, response):
        i = RecipesItem()
        hxs = HtmlXPathSelector(response)
        recipe = hxs.select('//div[@class = "hrecipe recipecomDetail"]')
        i['name'] = recipe.select('//div[@class = "floatleft W500 heading1"]/text()').extract()
        ingredients_list = []
        ingredients = recipe.select('//ul[@id = "ingredientList"]/li')
        
        for ingredient in ingredients:
            ingredient_item = ingredient.select('div/div/div[@class = "itemQuantity floatleft W120 ML10"]/text()').extract()
            ingredients_list.append(ingredient_item)
        i['ingredients'] = ingredients_list
        return i