# Define here the models for your scraped items
#
# See documentation in:
# http://doc.scrapy.org/topics/items.html

from scrapy.item import Item, Field

class RecipesItem(Item):
    # define the fields for your item here like:
    name = Field()
    ingredients = Field()
    directions = Field()
    cook_time = Field()
    servings = Field()
    nutrition = Field()
    image_urls = Field()
    images = Field()