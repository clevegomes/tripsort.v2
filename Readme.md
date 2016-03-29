<span id="OLE_LINK4" class="anchor"><span id="OLE_LINK1" class="anchor"><span id="OLE_LINK2" class="anchor"></span></span></span>Problem
----------------------------------------------------------------------------------------------------------------------------------------

You are given a stack of boarding cards for various transportations that
will take you from a point A to point B via several stops on the way.
All of the boarding cards are out of order and you don't know where your
journey starts, or where it ends. Write an API that lets you sort this
kind of list

<span id="OLE_LINK6" class="anchor"><span id="OLE_LINK5" class="anchor"></span></span>Assumption/Understanding
--------------------------------------------------------------------------------------------------------------

I am given a stack of boarding cards for different means of
transportation around the world. All these cards may be completely
different from each other in terms of content, details, language etc But
how ever all these cards must have an arrival and departure location. To
make things simpler I assume that the arrival and departure locations
will be names of cities only.

These stack of cards need to sorted only based on the arrival location
and departure location. The sorted cards then need to be displayed to
the user.

Since this is just an API I will display the result just by typing a
command in the command prompt and displaying the result.

Files
-------------------

 doc
    |----- [Documentation]
    src
    |----- lib
    |      |----- triporg
    |      |          |----- assets
    |      |          |             |---- AirwaysBoardingCard.php 
    |      |          |             |---- BcFactory.php 
    |      |          |             |---- BusBoardingCard.php 
    |      |          |             |---- GenericCard.php
    |      |          |             |---- RailwayBoardingCard.php
    |      |          |             |---- tripAbstract.php
    |      |          |             |---- tripInterface.php
    |      |          |----- modules
    |      |          |             |---- boardingCard
    |      |          |                              |---- BoardingCard.php
    |      |          |----- utils
    |      |          |             |---- traits
    |      |                                   |----- SortOrderN2.php
    test                                   
    |----- TripSortTest.php
    vendor                              
    |----- [PhpUnit/Autoload files pulled in by composer]                           
                                      
 

**What this code can do.**

We can give a set of boarding card data in different languages. The card
data will get converted into the correct card type. These set of cards
then will get sorted in the correct order based on the departure and
arrival locations.

**Executing **

1.  Run *composer update* to install the php unit testing files

2.  Run *phpunit*

**Requirements**

1.  PHP 5.4.0

2.  Composer 1.0

3.  Phpunit 3.7.21

**Functionality **

1.  Testing : The TripSortTest Class will test for

    a.  Creating of boarding cards.

    b.  Sorting of the unsorted boarding cards.

2.  Source Files: The project is divided into three sections that is the
    assets ,modules and utils

    a.  Assets: It contains the boarding card interface, boarding class
        abstract class, generic boarding card class, specific boarding
        card classes.

    b.  Modules: There is only one module called the boardingCard module
        that is responsible for sorting the boarding cards.

    c.  Utils: It contains the sorting trait that we can use for sorting
        the boarding cards. For now there is only one sort trait
        called SortOrderN2.

**Sorting Algorithm**

The sorting algorithm I have written is very similar to a bubble sort.
but here every next sorted element will bubble up in the list. The order
of complexity for this algorithm is.

Best case O (n), Average case O (n ²), Worst case O (n ²)


**Documentation**

Full documentation can be found at   doc/index.html