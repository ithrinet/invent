<?php

namespace Pasi\PanelBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Pasi\EmpleadoBundle\Entity\Empleado;
use Pasi\PanelBundle\Form\EmpleadoType;

/**
 * Empleado controller.
 *
 */
class EmpleadoController extends Controller
{
    /**
     * Lists all Empleado entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $empleados = $em->getRepository('EmpleadoBundle:Empleado')->findAll();

        return $this->render('PanelBundle:Empleado:index.html.twig', array(
            'empleados' => $empleados,
        ));
    }

    /**
     * Finds and displays a Empleado entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpleadoBundle:Empleado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Empleado entity.');
        }
        

        return $this->render('PanelBundle:Empleado:show.html.twig', array(
            'entity'      => $entity,
        		
                ));
    }

    /**
     * Displays a form to create a new Empleado entity.
     *
     */
    public function newAction()
    {
        $entity = new Empleado();
        $form   = $this->createForm(new EmpleadoType(), $entity);

        return $this->render('PanelBundle:Empleado:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
        
    }

    /**
     * Creates a new Empleado entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Empleado();
        $form = $this->createForm(new EmpleadoType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('empleado'));
        }

        return $this->render('PanelBundle:Empleado:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Empleado entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpleadoBundle:Empleado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Empleado entity.');
        }

        $editForm = $this->createForm(new EmpleadoType(), $entity);
        

        return $this->render('PanelBundle:Empleado:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }

    /**
     * Edits an existing Empleado entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpleadoBundle:Empleado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Empleado entity.');
        }

        $editForm = $this->createForm(new EmpleadoType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('empleado'));
        }

        return $this->render('EmpleadoBundle:Empleado:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }

    /**
     * Deletes a Empleado entity.
     *
     */
    public function deleteAction($id)
    {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EmpleadoBundle:Empleado')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Empleado entity.');
            }

            $em->remove($entity);
            $em->flush();
        

        return $this->redirect($this->generateUrl('empleado'));
    }
}
