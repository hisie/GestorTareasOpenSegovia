<?php

namespace Opensegovia\GestorTiempoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Opensegovia\GestorTiempoBundle\Entity\Reporte;
use Opensegovia\GestorTiempoBundle\Form\ReporteType;

/**
 * Reporte controller.
 *
 * @Route("/reporte")
 */
class ReporteController extends Controller
{
    /**
     * Lists all Reporte entities.
     *
     * @Route("/", name="reporte")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('OpensegoviaGestorTiempoBundle:Reporte')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Reporte entity.
     *
     * @Route("/{id}/show", name="reporte_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('OpensegoviaGestorTiempoBundle:Reporte')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reporte entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Reporte entity.
     *
     * @Route("/new", name="reporte_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Reporte();
        $form   = $this->createForm(new ReporteType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Reporte entity.
     *
     * @Route("/create", name="reporte_create")
     * @Method("post")
     * @Template("OpensegoviaGestorTiempoBundle:Reporte:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Reporte();
        $request = $this->getRequest();
        $form    = $this->createForm(new ReporteType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('reporte_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Reporte entity.
     *
     * @Route("/{id}/edit", name="reporte_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('OpensegoviaGestorTiempoBundle:Reporte')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reporte entity.');
        }

        $editForm = $this->createForm(new ReporteType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Reporte entity.
     *
     * @Route("/{id}/update", name="reporte_update")
     * @Method("post")
     * @Template("OpensegoviaGestorTiempoBundle:Reporte:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('OpensegoviaGestorTiempoBundle:Reporte')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reporte entity.');
        }

        $editForm   = $this->createForm(new ReporteType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('reporte_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Reporte entity.
     *
     * @Route("/{id}/delete", name="reporte_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('OpensegoviaGestorTiempoBundle:Reporte')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Reporte entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('reporte'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
