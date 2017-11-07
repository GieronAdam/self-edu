<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ORM\EntityManager;
use Application\Entity\Contact;

class ContactController extends AbstractActionController {
    private $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function addAction(): ViewModel {
        $firstname = $this->params()->fromRoute('firstname');
        $lastname = $this->params()->fromRoute('lastname');
        $tel = $this->params()->fromRoute('tel');

        $contact = new Contact();
        $contact->setFirstname($firstname);
        $contact->setLastname($lastname);
        $contact->setTel($tel);

        $this->entityManager->persist($contact);
        $this->entityManager->flush();

        $this->redirect()->toRoute('contact_show');

        return new ViewModel();
    }

    public function fetchAllAction(): ViewModel {
        return new ViewModel([
            'contacts' => $this->entityManager->getRepository(Contact::class)->findAll()
        ]);
    }
}