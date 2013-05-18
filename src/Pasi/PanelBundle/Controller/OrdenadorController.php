<?php

namespace Pasi\PanelBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Pasi\OrdenadorBundle\Entity\Ordenador;
use Pasi\PanelBundle\Form\OrdenadorType;

/**
 * Ordenador controller.
 *
 */
class OrdenadorController extends Controller
{
    /**
     * Lists all Ordenador entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('OrdenadorBundle:Ordenador')->findAll();

        return $this->render('PanelBundle:Ordenador:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Ordenador entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OrdenadorBundle:Ordenador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ordenador entity.');
        }        

        return $this->render('PanelBundle:Ordenador:show.html.twig', array(
            'entity'      => $entity,
            ));
    }

    /**
     * Displays a form to create a new Ordenador entity.
     *
     */
    public function newAction()
    {
        $entity = new Ordenador();
        $form   = $this->createForm(new OrdenadorType(), $entity);

        return $this->render('PanelBundle:Ordenador:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Ordenador entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Ordenador();
        $form = $this->createForm(new OrdenadorType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ordenador'));
        }

        return $this->render('PanelBundle:Ordenador:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Ordenador entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OrdenadorBundle:Ordenador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ordenador entity.');
        }

        $editForm = $this->createForm(new OrdenadorType(), $entity);        

        return $this->render('PanelBundle:Ordenador:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),            
        ));
    }

    /**
     * Edits an existing Ordenador entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OrdenadorBundle:Ordenador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ordenador entity.');
        }

        
        $editForm = $this->createForm(new OrdenadorType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ordenador'));
        }
    }

    /**
     * Deletes a Ordenador entity.
     *
     */
    public function deleteAction($id)
    {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('OrdenadorBundle:Ordenador')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Ordenador entity.');
            }

            $em->remove($entity);
            $em->flush();
        

        return $this->redirect($this->generateUrl('ordenador'));
    }

}
