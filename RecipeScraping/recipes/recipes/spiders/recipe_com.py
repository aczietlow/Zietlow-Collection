from scrapy.selector import HtmlXPathSelector
from scrapy.contrib.linkextractors.sgml import SgmlLinkExtractor
from scrapy.contrib.spiders import CrawlSpider, Rule
from recipes.items import RecipesItem

class RecipeComSpider(CrawlSpider):
    name = 'recipe.com'
    allowed_domains = ['recipe.com']
    #start_urls = ['http://www.recipe.com/']

    start_urls = [
                  "http://www.recipe.com/cheesy-italian-meatball-casserole/",
                  "http://www.recipe.com/green-goddess-dip/" 
                  ]
    rules = (
        Rule(SgmlLinkExtractor(allow=''), callback='parse_item', follow=True),
    )
    
    def parse_item(self, response):
        self.log('Hi, this is an item page! %s' % response.url)
        
        i = RecipesItem()
        hxs = HtmlXPathSelector(response)
        
        #recipe = hxs.select('//div[@class = "hrecipe recipecomDetail"]')
        i['name'] = hxs.select('//div[@class = "hrecipe recipecomDetail"]//div[@class = "floatleft W500 heading1"]/text()').extract()
        #i['name'] = "test"

        return i
