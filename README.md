DomCore - The PHP foundation classes to build powerfull applications
Powerfull code-independant template system, 
multi-language system, debug objects, 
and patterns implementation in PHP

[![Build Status](https://travis-ci.org/webability/DOMCORE.svg?branch=master)](https://travis-ci.org/webability/DOMCORE)

(c) 2008-2015 Philippe Thomassigny

DomCore is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

DomCore is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with DomCore.  If not, see <http://www.gnu.org/licenses/>.

----

Welcome to DomCore v3.

You need to install the DomCore directory into your application somewhere accesible by your scripts to include the php .lib scripts.

Once the directory is installed, just call the needed scripts and build your code !

Reference, manuals, examples: http://www.webability.info/?P=domcore
Follow us on twitter: @webability5

Thank you !

----

Languages:
EN - English language, native language
FR - French language, maintained by Philippe Thomassigny
ES - Spanish language, maintained by Philippe Thomassigny
NL - Dutch language, maintained by Roland van Wanrooy, abo at wanrooy dot be

----

To do:
- more languages
- more examples temp, lang, datasources, cache
- patterns: observer, painter, pool, etc.
- check SHM object when the class into unserial of the SHM memory does not exists => error ? how to manage ?
   Note: autoload is NOT catchable when shm_get_mem launch it !
- check how to manage if there is no available shared memory and/or semaphores
- Windows (lack of) shared memory ?

To change the build:
  edit WADebug.lib at the beginning and change the version number
  change this file and add comments on new build.

---

Build v3.0.4 2016-05-07
- Lots of errors corrected on the correct use of \core\WADebug into debugging code

Build v3.0.3 2016-05-06
- Autoload modified to be SPL compliant.
- Added travis PHPunit tester

Build v3.0.2 2016-01-26
- SHM enhanced when deleting some non-existent variable
- WAError enhanced to be compatible with PHP 5.2, PHP 5.4 and PHP 7 (3 different incompatible syntaxes)
- _toString in Throwable Trait enhanced (was not printing the first line of error)

Build v3.0.1 2015-12-02
- Many error corrected on namespaces
- Better support for PHP 7 (Exceptions and Error management)

Build v3.0.0 2015-11-13
- DomCore is now 100% compatible with PHP7
- DomCore is now based on namespaces
- Added Singleton::hasInstance() method
- WAThrowable is now a trait, so WAError and WAException extends from PHP system \Error and \Exception
- SHM has been rebuild to work also on filename ftok mapped IDs and do not use a variable map that is slow.
- Dispatcher pattern added
- Bug corrected into WATemplate on conditional loops.

---

Build v2.0.1 2015-06-10
- Added the WABase object to build the autoloaded base object for the system -- it links automatically into the WAObject base attribute on constructor. No more need to do it manually.
- Added the base object demo.

Build v2.0.0 2015-06-03
- Version number change to be RFC versioning complient
- WADebug syntax is now accepting parameters as variable with '%' into the string, sprintf like.
  Old version is still compatible.
  This is not compatible with PHP 5.6+ for global language syntax change. A branch for PHP 5.6+ will be created later
- Modification of all the debug code to use new syntax with '%'
- Modification of libraries path into WADebug messages as 'include/core/*'

---

Build 117 2015/04/22
- The datasources have now the tm1 and tm2 timestamps protected and not private so extended classes can use them

Build 116 2015/04/21
- in TemplateSource and LanguageSource, the parameter fastobjectsource is now optional

Build 115 2014/11/11
- Bug corrected in WATemplate, the loop 'sel' metaelement was not working anymore
- Modified example of templateloop.php to work again with the loop 'sel' metaelement.

Build 114 2014/10/21
- Added patterns to WAFile->deleteAll() with * to delete multiple filtered directories
  for example deleteAll('/home/sites/base5/domcore/somefiles.*', '\/home\/sites\/base5');
- Bug corrected in WATemplate, to be sure the array is traversable before using it to resolve a meta element.

Build 113 2013/05/20
- Bug corrected in WATemplate, the ?? conditional meta keyword was not resolving sub templates if the condition was not a sub array
- Bug corrected in WATemplate, the @@ loop meta keyword was not resolving sub templates if the condition was not a sub array
- Added support for '.first', '.last' and '.num' subtemplates in @@ loop meta kewyord
- Bug corrected in WATemplate, the is_usable method is static thus must be used with WATemplate:: instead of $this->

Build 112 2012/12/19
- Modified WATemplate to include scalar values for conditional template ??id??

Build 111 2012/11/26
- Added a test in FileSource->unlink to unlink only existing files
- WATemplate modified to support traversable/arrayaccess metaelement objects (that are not be necesarly arrays)
  for example the DB_Record and DB_Records from dominion are now directly supported as metaelements
- WATemplate->metaElements is now strict by default
- WATemplate->metaElements compiler modified to support elements without space (to safeguard the '&&' javascript keyword among others)
- WAFile->deleteAll modified, the method was trying to delete twice the directory 
- Semaphores implemented in WASHM to avoid memory access conflicts
  
Build 110 2012/08/04:
- WAObject adjusted on Strict mode for PHP5.4

Build 109 2012/07/12:
- FastObjectSource modified to delete the cache and afo if the origin disappear (is deleted)
- LanguageSource modified to delete the cache and afo if the origin disappear (is deleted)
- TemplateSource modified to delete the cache and afo if the origin disappear (is deleted)

Build 108 2012/05/18:
- The WATemplate syntax analyser does not use anymore urlencode and urldecode to gain a lot of compilation time.
- Error corrected in the compiler regular expression in WATemplate. Sometimes the subtemplate was not correctly replaced

Build 107 2012/05/16:
- Error corrected in WATemplate: the subtemplate IDs can be only letters, digits, or special chars: .-_|
- WATemplate->metaElements just do nothing if it is the second call.

Build 106 2012/05/13:
- Error corrected in WATemplate: the [[...]] metaelement was not working as expected sometimes
- Error corrected in WATemplate: the {{...}} metaelement was not working as expected sometimes
- Modified WATemplate->metaElements so it can be called only once
- all examples modified to use [[...]] and strict metaelements

Build 105 2012/04/30:
- preg_replace replaced by str_replace into WATemplate for higher velocity
- strict mode added into metaelements (data parameters must be used with {{...}} only)
- strict mode example added
- New [[id]]...[[]] syntax for subtemplates added with its respective modifications in the examples
- IMPORTANT NOTE: the %%SUBTEMPLATE()%%...%%ENDSUBTEMPLATE%% syntax will be deprecated soon to be officially replaced by the [[id]]...[[]] syntax. It has been kept for back compatibility for now

Build 104 2012/04/21:
- Error corrected in WATemplate, the ?? metaelement was not working as specified
- WATemplate modified to support path data access into the data array (i.e. ??VAR1>VAR2>VAR3:templateid?? )
- WATemplate modified to use hierarchic accesibility on templates (if the template does not exists in a level, it will be searched in the father)
- WATemplate modified to support a new meta element {{...}} to directly access an entry in the data array
- New example added for path data and {{...}} meta element

Build 103 2012/04/03:
- Replaced 'while' by 'foreach' in WATemplate
- Some new comments into WASHM
- Factory implemented with its examples

Build 102 2012/03/27:
- singleton message entry added into languages
- Singleton modified to keep instance after constructor
- Singleton::getInstance simplified and modified to use default called class
- Multiton.lib implemented
- multiton message entry added into languages

Build 101 2012/03/24:
- WASimpleXML::tags() modified to convert several identical tags into an array instead of only the last one
- netherland translation corrected
- patterns added, Singleton class added

Build 15 2012/03/21:
- Messages of WASHM moved to WAMessage, static messages removed from WASHM, UML box adjusted
- Messages of FileSource moved to WAMessage, static messages removed from FileSource, UML box adjusted
- Netherland NL (Dutch) messages added
- LanguageSource.data entry has been removed from messages (not used anymore)
- WAMessage now accept various files for entry and all are loaded when needed, UML box adjusted
- WAMessage examples modified to use various files for entry
- Markups added into XML messages to extract them

Build 14 2012/03/04:
- Adjustment of all the comments and copyrights in the libraries
- Added WASimpleXML::tags to extract only the tags*or*data XML hierarchy

Build 13 2012/02/22:
- TemplateSource modified to write correctly the template into AFO and shared. TemplateSource cannot write the original template for now
- examples/language.php modified to use WALanguageCompiler
- WAMessage modified to use WALanguageCompiler and optimize the file loading
- WALanguageCompiler modified to use WASimpleXML
- Static WASimpleXML has been added to convert any simple XML to PHP array
- Static WALanguage has been moved to WALanguageCompiler
- WALanguage is now class to keep the languages and is extendable, and implements Iterator
- Bug removed in WALanguageCompiler to init self::$id and self::$lang on compiling a new language table

Build 12 2011/12/10:
- WAThrowable->__toString has been modified to print errors correctly on CLI version

Build 11 2011/10/22:
- Added __toString to WATemplate so the template can be directly printed instead of resolved (print $temp; is the same as print $temp->resolve();).
- DataSource now extends WAObject, not WAClass, it is not supposed to be serializable
- Removed a bug in calculation of validity in LanguageSource->isValid()
- Removed a bug in calculation of validity in FastObjectSource->isValid()
- Removed a bug in LanguageSource->valid() to end the Iterator
- Added support to WATemplate->getTemplate(null) to get the default main template
- Added WATemplate->getTemplates() to get all the subtemplates array
- Removed clearcachestats from FileSource
- Modified WATemplate->__construct() to avoid warnings when the array is incomplete

Build 10 2011/10/18:
- Code clean-up:
- Changed all the \n by PHP_EOL (in WAThrowable and WADebug)
- Changed all the ".." by '..' on simple strings in code
- Added some missing variable in DataSource debug code
- Iterator implemented into LanguageSource
- Corrected UML box in WALanguage
- WASHM changed to use microtime() instead of time()
- DataSource changed to use microtime() instead of time()
- FastObjectSource modified to use shared memory efficiently
- LanguageSource modified to use shared memory efficiently
- Added WATemplate object to manage templates
- Added WATemplate examples
- Added WATemplate documentation in wiki

Build 9 2011/10/12:
- Added dates (read & write) on SHM index
- Added method 'create' on WALanguage static object to create back the original XML
- Added Datasources libraries: DataSource, FileSource, SHMSource, FastObjectSource, LanguageSource
- Added datasources examples
- Added manual of datasources in wiki
- Modified SHM example for best display and remove security problem

Build 8 2011/10/10:
- Added SHMError in throwables to call if any shared memory error
- Added WASHM library to manage shared memory
- Added examples of shared memory
- Added manual of shared memory in wiki
- Added errors and exceptions in the wiki manual

Build 7 2011/10/07:
- Examples rebuild with new beautifull presentation
- A new directory /messages has been added with the translation of all basic messages into some languages

Build 6 2010/12/25:
- A bug has been removed from File::deleteALL, the validation regexp was not used well

Build 5 2010/08/17:
- Serial data is now passed by reference into the serial function
- Examples adjusted

Build 4 2010/08/04:
- Added static convert() to WALanguage so the xml compiler works
- Added WAFile.baddir to throw errors on non compliant directory to delete recursively
- Added a protection into WAFile.deleteALL with a regular expression to be sure we delete the right directory

Build 3 2010/07/28:
- Full explain has been moved to WADebug and enhanced with class origin of attribute
- Timing functions have been moved to WADebug and removed from WAObject
- lastmodif timing has been removed since there is no real way to get the last used of the object without implements explicitely functions.
- Debug functions have been removed from WAObject
- Serializing functions have been moved from WAObject to WAClass
- Added serial() and unserial() methods into WAClass to be overloaded by the extended object
- Added WAClass.serial and WAClass.unserial messages into WAMessage
- New serialize.php example has been added

Build 2 2010/07/26:
- Added a check in WADebug->getNumInstances()
- Corrected a bug on doDebug to colour the messages
- Version is now correctly 1.00.02 instead of 8.00.02
- Examples corrected, WADEBUG defined constant has been added
- removed constructor of WALanguage

Build 1 2010/06/08:
- Separation from Dominion v7, creation of v8.00.01
- Added function addMessages to WAMessage static object
- Added __autoload.lib
- Added index.html
- Modified WADebug to test if the defined WADEBUG is set or not to activate debug mode
