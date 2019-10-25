<?php

namespace Application\Controller;

use Application\Service\ContactService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * @property \Zend\Http\Request $request
 */
class ContactController extends AbstractActionController
{

    /** @var ContactService */
    protected $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function listAction()
    {
        // throw new Exception('Mon error');

//        $liste = [
//            (new Contact())->setId(1)->setPrenom('<script>alert("XSS")</script>')->setNom('Bohdanowicz'),
//            (new Contact())->setId(2)->setPrenom('Toto')->setNom('Titi'),
//        ];

        $liste = $this->contactService->getAll();

        return new ViewModel([
            'contacts' => $liste
        ]);
    }

    public function showAction()
    {
//        $params = $this->getPluginManager()->get('params');
//        $id = $params('id');

        $id = $this->params('id');

        $contact = $this->contactService->getById($id);

        if (!$contact) {
            return $this->notFoundAction();
        }

        return new ViewModel([
            'contact' => $contact,
        ]);
    }

    public function createAction()
    {
        // TODO la meilleure pratique aurait été
        // d'enregistrer le formulaire dans le plugin
        // du service manager spécialisé dans les éléments
        // de formulaire puis d'injecter la dépendance
        // IDEM POUR LES HYDRATEURS
        // ENCORE MIEUX
        // On pourra le déclarer Lazy, ce qui permettrait
        // de ne l'instancier que si nécessaire
        $contactForm = $this->contactService->getForm();

        // Style Zend passer par l'objet requete
        // $_POST['prenom']
        // $this->request->getPost('prenom')

        if ($this->request->isPost()) {
            $contactForm->setInputFilter(new \Application\InputFilter\ContactInputFilter());
            $data = $this->request->getPost()->toArray();
            $contactForm->setData($data);

            if ($contactForm->isValid()) {
                $this->contactService->save($data);
                $this->flashMessenger()
                        ->addSuccessMessage('Le contact a bien été créé');
                return $this->redirect()->toRoute('contacts');
            }
        }

        return new ViewModel([
            'contactForm' => $contactForm,
        ]);
    }

}
