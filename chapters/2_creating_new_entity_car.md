
# Create new Entitity

Let's now create a new entity called Car by writing a new custom pack.

## Create a new entity file in the following path.

File path: custom/Espo/Custom/Entities/Car.php

```php
<?php

namespace Espo\Custom\Entities;

class Car extends \Espo\Core\Templates\Entities\Base
{
    public const ENTITY_TYPE = 'Car';
}
```

## Add a controller and repository to the new entity.

File path: custom/Espo/Custom/Controllers/Car.php

```php
<?php

namespace Espo\Custom\Controllers;

class Car extends \Espo\Core\Templates\Controllers\Base
{

}
```

File path: custom/Espo/Custom/Repositories/Car.php

```php
<?php

namespace Espo\Custom\Repositories;

class Car extends \Espo\Core\Templates\Repositories\Base
{

}

```

## Define scope for the entity.

File path: custom/Espo/Custom/Resources/metadata/scopes/Car.json

```json
{
    "entity": true,
    "layouts": true,
    "tab": true,
    "acl": true,
    "aclPortal": true,
    "aclPortalLevelList": [
        "all",
        "account",
        "contact",
        "own",
        "no"
    ],
    "customizable": true,
    "importable": true,
    "notifications": true,
    "stream": false,
    "disabled": false,
    "type": "Base",
    "module": "Custom",
    "object": true,
    "isCustom": true
}
```
## Define the fields
Lets now add fields to our entity Car. We need to write a entity defination file to add the fields.

File path: custom/Espo/Custom/Resources/metadata/entityDefs/Car.json

```json
{
    "fields": {
        "name": {
            "type": "varchar",
            "required": true,
            "trim": true,
            "pattern": "$noBadCharacters"
        },
        "description": {
            "type": "text"
        },
        "createdAt": {
            "type": "datetime",
            "readOnly": true
        },
        "modifiedAt": {
            "type": "datetime",
            "readOnly": true
        },
        "createdBy": {
            "type": "link",
            "readOnly": true,
            "view": "views/fields/user"
        },
        "modifiedBy": {
            "type": "link",
            "readOnly": true,
            "view": "views/fields/user"
        },
        "assignedUser": {
            "type": "link",
            "required": true,
            "view": "views/fields/assigned-user"
        },
        "teams": {
            "type": "linkMultiple",
            "view": "views/fields/teams"
        },
        "model": {
            "type": "text",
            "rowsMin": 2,
            "cutHeight": 200,
            "isCustom": true
        },
        "price": {
            "notNull": false,
            "type": "float",
            "isCustom": true
        },
        "makeYear": {
            "type": "text",
            "rowsMin": 2,
            "cutHeight": 200,
            "isCustom": true
        },
        "seating": {
            "type": "int",
            "isCustom": true
        },
        "fuelType": {
            "type": "enum",
            "options": [
                "Petrol",
                "Diesel"
            ],
            "style": {
                "Petrol": null,
                "Diesel": null
            },
            "default": "Petrol",
            "isCustom": true
        },
        "hp": {
            "type": "int",
            "isCustom": true
        },
        "cc": {
            "type": "int",
            "isCustom": true
        },
        "gearType": {
            "type": "enum",
            "options": [
                "Manual",
                "Automatic"
            ],
            "style": {
                "Manual": null,
                "Automatic": null
            },
            "default": "Manual",
            "isCustom": true
        }
    },
    "links": {
        "createdBy": {
            "type": "belongsTo",
            "entity": "User"
        },
        "modifiedBy": {
            "type": "belongsTo",
            "entity": "User"
        },
        "assignedUser": {
            "type": "belongsTo",
            "entity": "User"
        },
        "teams": {
            "type": "hasMany",
            "entity": "Team",
            "relationName": "EntityTeam",
            "layoutRelationshipsDisabled": true
        }
    },
    "collection": {
        "orderBy": "createdAt",
        "order": "desc"
    },
    "indexes": {
        "name": {
            "columns": [
                "name",
                "deleted"
            ]
        },
        "assignedUser": {
            "columns": [
                "assignedUserId",
                "deleted"
            ]
        }
    }
}
```

Once the fields are defined we need to give user friendly labels to the fields and options in them.

File path: custom/Espo/Custom/Resources/i18n/en_US

```json
{
    "fields": {
        "model": "Model",
        "price": "Price",
        "makeYear": "Make Year",
        "seating": "Seating",
        "fuelType": "Fuel Type",
        "hp": "HP",
        "cc": "CC",
        "gearType": "Gear Type"
    },
    "links": [],
    "labels": {
        "Create Car": "Create Car"
    },
    "options": {
        "fuelType": {
            "Petrol": "Petrol",
            "Diesel": "Diesel"
        },
        "gearType": {
            "Manual": "Manual",
            "Automatic": "Automatic"
        }
    }
}
```

To show the fields in the UI we need to write the layout file.

File path: custom/Espo/Custom/Resources/layouts/Car/detail.js

```json
[
    {
        "rows": [
            [
                {
                    "name": "name"
                },
                {
                    "name": "model"
                }
            ],
            [
                {
                    "name": "makeYear"
                },
                {
                    "name": "price"
                }
            ],
            [
                {
                    "name": "fuelType"
                },
                {
                    "name": "gearType"
                }
            ],
            [
                {
                    "name": "seating"
                },
                {
                    "name": "cc"
                }
            ],
            [
                {
                    "name": "description"
                },
                {
                    "name": "hp"
                }
            ]
        ],
        "style": "default",
        "label": "Overview"
    }
]
```


