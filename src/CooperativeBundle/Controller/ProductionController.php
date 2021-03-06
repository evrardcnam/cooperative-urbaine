<?php

namespace CooperativeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CooperativeBundle\Entity\Production;
use CooperativeBundle\Form\ProductionType;

/**
 * Production controller.
 *
 */
class ProductionController extends Controller
{

    /**
     * Lists all Production entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CooperativeBundle:Production')->findAll();

        return $this->render('CooperativeBundle:Production:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Production entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Production();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('production_show', array('id' => $entity->getId())));
        }

        return $this->render('CooperativeBundle:Production:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Production entity.
     *
     * @param Production $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Production $entity)
    {
        $form = $this->createForm(new ProductionType(), $entity, array(
            'action' => $this->generateUrl('production_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Production entity.
     *
     */
    public function newAction()
    {
        $entity = new Production();
        $form   = $this->createCreateForm($entity);

        return $this->render('CooperativeBundle:Production:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Production entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CooperativeBundle:Production')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Production entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CooperativeBundle:Production:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Production entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CooperativeBundle:Production')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Production entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CooperativeBundle:Production:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Production entity.
    *
    * @param Production $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Production $entity)
    {
        $form = $this->createForm(new ProductionType(), $entity, array(
            'action' => $this->generateUrl('production_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Production entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CooperativeBundle:Production')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Production entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('production_edit', array('id' => $id)));
        }

        return $this->render('CooperativeBundle:Production:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Production entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CooperativeBundle:Production')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Production entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('production'));
    }

    /**
     * Creates a form to delete a Production entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('production_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
