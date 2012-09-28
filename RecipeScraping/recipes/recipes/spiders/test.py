from scrapy.selector import HtmlXPathSelector
from scrapy.contrib.linkextractors.sgml import SgmlLinkExtractor
from scrapy.contrib.spiders import CrawlSpider, Rule
from recipes.items import RecipesItem

class TestSpider(CrawlSpider):
    name = 'test'
    allowed_domains = ['spyderbytedesign.com']
    start_urls = ['http://www.spyderbytedesign.com/']

    rules = (
        Rule(SgmlLinkExtractor(allow=''), callback='parse_item', follow=True),
    )

    def parse_item(self, response):
        #hxs = HtmlXPathSelector(response)
        i = RecipesItem()
        #i['domain_id'] = hxs.select('//input[@id="sid"]/@value').extract()
        i['name'] = response.url 
        #i['description'] = hxs.select('//div[@id="description"]').extract()
        return i
