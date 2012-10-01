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
        
        ingredients_list = []
        ingredients = recipe.select('//ul[@id = "ingredientList"]/li')
        
        directions_list = []
        directions = recipe.select('//span[@class = "instructions"]/div[@class = "step"]')
        
        #Recipe Heading
        i['name'] = recipe.select('//div[@class = "floatleft W500 heading1"]/text()').extract()
        
        #Recipe image url
        i['image_urls'] = recipe.select('//img[@class = "photo"]/@src').extract()
        
        #recipe cook time
        i['cook_time'] = recipe.select('//span[@class = "duration"]/text()').extract()
        
        #Recipe servings
        i['servings'] = recipe.select('//span[@class = "servingsize"]/text()').extract()
        
        #Recipe ingredients
        for ingredient in ingredients:
            ingredient_item = ingredient.select('div/div/div[@class = "itemQuantity floatleft W120 ML10"]/text()').extract()
            ingredient_item += ingredient.select('div/div/div[@class = "floatleft itemUnit W420"]/text()').extract()
            ingredients_list.append(ingredient_item)
        i['ingredients'] = ingredients_list
        
        #Recipe directions
        for direction in directions:
            direction =  direction.select('div[@class = "stepbystepInstruction instruction"]/text()').extract()
            directions_list.append(direction)
        i['directions'] = directions_list
        
        #Recipe nutrition
        i['nutrition'] = recipe.select('//div[@class = "nutritionDetail"]/text()').extract()
        
        
        return i