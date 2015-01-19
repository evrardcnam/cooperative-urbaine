<?php

namespace CooperativeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CooperativeBundle\Entity\Consomacteur;
use CooperativeBundle\Form\ConsomacteurType;

/**
 * Consomacteur controller.
 *
 */
class ConsomacteurController extends Controller
{

    /**
     * Lists all Consomacteur entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CooperativeBundle:Consomacteur')->findAll();

        return $this->render('CooperativeBundle:Consomacteur:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Consomacteur entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Consomacteur();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('consomacteur_show', array('id' => $entity->getId())));
        }

        return $this->render('CooperativeBundle:Consomacteur:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Consomacteur entity.
     *
     * @param Consomacteur $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Consomacteur $entity)
    {
        $form = $this->createForm(new ConsomacteurType(), $entity, array(
            'action' => $this->generateUrl('consomacteur_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Consomacteur entity.
     *
     */
    public function newAction()
    {
        $entity = new Consomacteur();
        $form   = $this->createCreateForm($entity);

        return $this->render('CooperativeBundle:Consomacteur:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Consomacteur entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CooperativeBundle:Consomacteur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Consomacteur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CooperativeBundle:Consomacteur:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Consomacteur entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CooperativeBundle:Consomacteur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Consomacteur entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CooperativeBundle:Consomacteur:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Consomacteur entity.
    *
    * @param Consomacteur $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Consomacteur $entity)
    {
        $form = $this->createForm(new ConsomacteurType(), $entity, array(
            'action' => $this->generateUrl('consomacteur_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Consomacteur entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CooperativeBundle:Consomacteur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Consomacteur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('consomacteur_edit', array('id' => $id)));
        }

        return $this->render('CooperativeBundle:Consomacteur:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Consomacteur entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CooperativeBundle:Consomacteur')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Consomacteur entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('consomacteur'));
    }

    /**
     * Creates a form to delete a Consomacteur entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('consomacteur_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
