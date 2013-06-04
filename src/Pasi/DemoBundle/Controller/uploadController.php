<?php

namespace Pasi\DemoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Pasi\DemoBundle\Entity\upload;
use Pasi\DemoBundle\Form\uploadType;

/**
 * upload controller.
 *
 */
class uploadController extends Controller
{
    /**
     * Lists all upload entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DemoBundle:upload')->findAll();

        return $this->render('DemoBundle:upload:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a upload entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DemoBundle:upload')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find upload entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DemoBundle:upload:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new upload entity.
     *
     */
    public function newAction()
    {
        $entity = new upload();
        $form   = $this->createForm(new uploadType(), $entity);

        return $this->render('DemoBundle:upload:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new upload entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new upload();
        $form = $this->createForm(new uploadType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('upload_show', array('id' => $entity->getId())));
        }

        return $this->render('DemoBundle:upload:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing upload entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DemoBundle:upload')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find upload entity.');
        }

        $editForm = $this->createForm(new uploadType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DemoBundle:upload:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing upload entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DemoBundle:upload')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find upload entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new uploadType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('upload_edit', array('id' => $id)));
        }

        return $this->render('DemoBundle:upload:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a upload entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DemoBundle:upload')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find upload entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('upload'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
