DomCore - The PHP basic classes to build powerfull applications
(c) 2010 Philippe Thomassigny

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

Welcome to DomCore v1.

You need to install the DomCore directory into your application somewhere accesible by your scripts to include the php .lib scripts.

Once the directory is installed, just call the needed scripts and build your code !

Reference, manuals, examples: http://www.webability.info/?P=domcore
Follow us on twitter: @webability5

Thank you !

----

This is the build 13

- To change the build:
  edit WADebug.lib at the beginning and change the version number
  change this file and add comments on new build.

To do:
- Is WATemplate able to rebuild the original template string ? into TemplateSource line.78

----

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
