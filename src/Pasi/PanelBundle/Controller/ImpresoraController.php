<?php

namespace Pasi\PanelBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Pasi\ImpresoraBundle\Entity\Impresora;
use Pasi\PanelBundle\Form\ImpresoraType;

/**
 * Impresora controller.
 *
 */
class ImpresoraController extends Controller
{
    /**
     * Lists all Impresora entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ImpresoraBundle:Impresora')->findAll();

        return $this->render('PanelBundle:Impresora:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Impresora entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImpresoraBundle:Impresora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Impresora entity.');
        }

        

        return $this->render('PanelBundle:Impresora:show.html.twig', array(
            'entity'      => $entity,
         ));
    }

    /**
     * Displays a form to create a new Impresora entity.
     *
     */
    public function newAction()
    {
        $entity = new Impresora();
        $form   = $this->createForm(new ImpresoraType(), $entity);

        return $this->render('PanelBundle:Impresora:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Impresora entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Impresora();
        $form = $this->createForm(new ImpresoraType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('impresora_show', array('id' => $entity->getId())));
        }

        return $this->render('PanelBundle:Impresora:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Impresora entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImpresoraBundle:Impresora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Impresora entity.');
        }

        $editForm = $this->createForm(new ImpresoraType(), $entity);

        return $this->render('PanelBundle:Impresora:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }

    /**
     * Edits an existing Impresora entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImpresoraBundle:Impresora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Impresora entity.');
        }

        $editForm = $this->createForm(new ImpresoraType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('impresora_show', array('id' => $entity->getId())));
        }

        return $this->render('PanelBundle:Impresora:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }

    /**
     * Deletes a Impresora entity.
     *
     */
    public function deleteAction($id)
    {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ImpresoraBundle:Impresora')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Impresora entity.');
            }
            $em->remove($entity);
            $em->flush();


        return $this->redirect($this->generateUrl('impresora'));
    }

    
}
