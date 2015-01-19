<?php

namespace CooperativeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CooperativeBundle\Entity\Maraicher;
use CooperativeBundle\Form\MaraicherType;

/**
 * Maraicher controller.
 *
 */
class MaraicherController extends Controller
{

    /**
     * Lists all Maraicher entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CooperativeBundle:Maraicher')->findAll();

        return $this->render('CooperativeBundle:Maraicher:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Maraicher entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Maraicher();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('maraicher_show', array('id' => $entity->getId())));
        }

        return $this->render('CooperativeBundle:Maraicher:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Maraicher entity.
     *
     * @param Maraicher $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Maraicher $entity)
    {
        $form = $this->createForm(new MaraicherType(), $entity, array(
            'action' => $this->generateUrl('maraicher_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Maraicher entity.
     *
     */
    public function newAction()
    {
        $entity = new Maraicher();
        $form   = $this->createCreateForm($entity);

        return $this->render('CooperativeBundle:Maraicher:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Maraicher entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CooperativeBundle:Maraicher')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Maraicher entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CooperativeBundle:Maraicher:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Maraicher entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CooperativeBundle:Maraicher')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Maraicher entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CooperativeBundle:Maraicher:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Maraicher entity.
    *
    * @param Maraicher $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Maraicher $entity)
    {
        $form = $this->createForm(new MaraicherType(), $entity, array(
            'action' => $this->generateUrl('maraicher_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Maraicher entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CooperativeBundle:Maraicher')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Maraicher entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('maraicher_edit', array('id' => $id)));
        }

        return $this->render('CooperativeBundle:Maraicher:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Maraicher entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CooperativeBundle:Maraicher')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Maraicher entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('maraicher'));
    }

    /**
     * Creates a form to delete a Maraicher entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('maraicher_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
