<?php

namespace Pasi\PanelBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Pasi\MovilBundle\Entity\Movil;
use Pasi\PanelBundle\Form\MovilType;

/**
 * Movil controller.
 *
 */
class MovilController extends Controller
{
    /**
     * Lists all Movil entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MovilBundle:Movil')->findAll();

        return $this->render('PanelBundle:Movil:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Movil entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MovilBundle:Movil')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Movil entity.');
        }

        return $this->render('PanelBundle:Movil:show.html.twig', array(
            'entity'      => $entity,
        		
        ));
    }

    /**
     * Displays a form to create a new Movil entity.
     *
     */
    public function newAction()
    {
        $entity = new Movil();
        $form   = $this->createForm(new MovilType(), $entity);

        return $this->render('PanelBundle:Movil:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Movil entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Movil();
        $form = $this->createForm(new MovilType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('movil_show', array('id' => $entity->getId())));
        }

        return $this->render('PanelBundle:Movil:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Movil entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MovilBundle:Movil')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Movil entity.');
        }

        $editForm = $this->createForm(new MovilType(), $entity);

        return $this->render('PanelBundle:Movil:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }

    /**
     * Edits an existing Movil entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MovilBundle:Movil')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Movil entity.');
        }
        $editForm = $this->createForm(new MovilType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('movil_show', array('id' => $entity->getId())));
        }

        return $this->render('PanelBundle:Movil:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }

    /**
     * Deletes a Movil entity.
     *
     */
    public function deleteAction($id)
    {
    		$em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MovilBundle:Movil')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Movil entity.');
            }

            $em->remove($entity);
            $em->flush();
        

        return $this->redirect($this->generateUrl('movil'));
    }
}
