# Write custom methods to add business flows

## 1) Assign the leads in RR fashion

File path: custom/Espo/Custom/Hooks/Lead/LeadHooks.php

```
namespace Espo\Custom\Hooks\Lead;

use Espo\Core\ORM\EntityManager;
use Espo\ORM\Entity;

class LeadHooks
{
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function afterSave(Entity $lead, array $options = array())
    {
        $assignedUserId = $this->roundRobinAssignment();
        $lead->set([
            'assignedUserId' => $assignedUserId
        ]);
    }

    public function roundRobinAssignment()
    {
        $userIds = array();
        $users = $this->entityManager->getRDBRepository('User')->find();
        foreach ($users as $user) {
            array_push($userIds, $user->get('id'));
        }
        $rand = rand(0, sizeof($userIds));
        return $userIds[$rand];
    }
```

## 2) Create demo meetings for the clients

Let' now schedule meetings for all the leads who request a demo from the website. Add the following code in your afterSave() hook.

File path: custom/Espo/Custom/Hooks/Lead/LeadHooks.php

```

if ($lead->get('leadType') == 'Demo') {
    $meeting = $this->entityManager->getEntity('Meeting');
    $meeting->set([
        'name' => 'Demo | ' . $lead->get('carModel') . ' | ' . $lead->get('firstName'),
        'parentId' => $lead->get('id'),
        'parentType' => $lead->getEntityType(),
        'dateStart' => $lead->get('demoDate'),
        'duration' => '7200',
        'assignedUserId' => $assignedUserId
    ]);
    $this->entityManager->saveEntity($meeting);
}

```

## 3) Create follow-up calls

To handle other leads who reach us via contact us page let's add the following method in the afterSave() hook.


File path: custom/Espo/Custom/Hooks/Lead/LeadHooks.php

```

else{
    $call = $this->entityManager->getEntity('Call');
    $currentTime = new \DateTime();
    $currentTime = $currentTime->format('Y-m-d-H-i-s');
    $call->set([
        'name' => 'FollowUp | ' . $lead->get('firstName'),
        'parentId' => $lead->get('id'),
        'parentType' => $lead->getEntityType(),
        'dateStart' => $currentTime,
        'duration' => '900',
        'assignedUserId' => $assignedUserId
    ]);
    $this->entityManager->saveEntity($call);
}

```


