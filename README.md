Spot Labs
====

Elgg 'Spot Labs' plugin. A place to feature experimental and cool new features.

## Directory Stucture

Individual 'labs' should always be contained in their own respective
subdirectorys. ie:
 
- actions/lab/someaction
- views/default/lab/someview
- views/default/forms/lab/someform
- views/default/js/lab/somejs
- vendors/lab/somevendor

## Naming Convention

When registering libraries, css, js and creating functions, you should aim 
to namespace them accordingly, ie: 

##### Libs
elgg:lab

##### CSS/JS:
elgg.lab  

##### Functions
lab_do_something_neat
