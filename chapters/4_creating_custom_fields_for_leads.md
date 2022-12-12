# Adding custom Fields To your Entities

Our Lead Form ont the website contains a Car Model and a date to pick Appointment.

But we don't have fields to store them in CRM.

Let's add them.

Create the following file.

`custom_pack/files/custom/Espo/Custom/Resources/metadata/entityDefs/Lead.json`

And enter the following content:

```json
{
    "fields": {
        "carModel": {
            "type": "text",
            "rowsMin": 2,
            "cutHeight": 200,
            "isCustom": true
        },
        "leadType": {
            "type": "enum",
            "options": [
                "Demo",
                "Contact Us"
            ],
            "style": {
                "Demo": null,
                "Contact Us": null
            },
            "default": "Demo",
            "isCustom": true
        },
        "demoDate": {
            "notNull": false,
            "type": "datetime",
            "minuteStep": 30,
            "isCustom": true
        }
    }
}
```

This will add 
1. a carModel of type Text to store what model the user is interested in.
2. A Lead Type field to decide if the user has arrived from Contact Us Page or the Book A Demo page.
3. a demoDate field to store the Date of appointment for the Lead.

## Now once we have added the fields we need to add them to the UI

Create the following file: `custom_pack/files/custom/Espo/Custom/Resources/layouts/Lead/detail.js`

```json
[
    {
        "rows": [
            [
                {
                    "name": "name"
                },
                {
                    "name": "accountName"
                }
            ],
            [
                {
                    "name": "carModel"
                },
                {
                    "name": "demoDate"
                }
            ],
            [
                {
                    "name": "emailAddress"
                },
                {
                    "name": "phoneNumber"
                }
            ],
            [
                {
                    "name": "title"
                },
                {
                    "name": "website"
                }
            ],
            [
                {
                    "name": "address"
                },
                false
            ]
        ],
        "style": "default",
        "label": "Overview"
    },
    {
        "rows": [
            [
                {
                    "name": "status"
                },
                {
                    "name": "source"
                }
            ],
            [
                {
                    "name": "opportunityAmount"
                },
                {
                    "name": "campaign"
                }
            ],
            [
                {
                    "name": "industry"
                },
                false
            ],
            [
                {
                    "name": "description"
                }
            ]
        ],
        "style": "default",
        "label": "Details"
    }
]
```

You can see the layout definiation contains your newly added fields.

We can now install the pack and see the reflected fields when you enter them on the website.