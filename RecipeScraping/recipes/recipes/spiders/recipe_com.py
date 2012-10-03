from scrapy.selector import HtmlXPathSelector
from scrapy.contrib.linkextractors.sgml import SgmlLinkExtractor
from scrapy.contrib.spiders import CrawlSpider, Rule
from recipes.items import RecipesItem

class RecipeComSpider(CrawlSpider):
    name = 'recipe.com'
    allowed_domains = ['recipe.com']
    start_urls = ['http://www.recipe.com/']

    rules = (
        Rule(SgmlLinkExtractor(allow=(''), deny=('common/', 'blogs/','user/' )), callback='parse_item', follow=True),
        #Rule(SgmlLinkExtractor(restrict_xpaths=('//div[@class = "hrecipe recipecomDetail"]')), callback='parse_item', follow=True),
    )
    
    def parse_item(self, response):
        i = RecipesItem()
        hxs = HtmlXPathSelector(response)
        recipe = hxs.select('//div[@class = "hrecipe recipecomDetail"]')
        
        if recipe:
            
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