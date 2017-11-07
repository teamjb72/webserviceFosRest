<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Offices;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Office controller.
 *
 * @Route("offices")
 */
class OfficesController extends Controller
{
    /**
     * Lists all office entities.
     *
     * @Route("/", name="offices_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $offices = $em->getRepository('AppBundle:Offices')->findAll();

        return $this->render('offices/index.html.twig', array(
            'offices' => $offices,
        ));
    }

    /**
     * Creates a new office entity.
     *
     * @Route("/new", name="offices_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $office = new Office();
        $form = $this->createForm('AppBundle\Form\OfficesType', $office);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($office);
            $em->flush();

            return $this->redirectToRoute('offices_show', array('officecode' => $office->getOfficecode()));
        }

        return $this->render('offices/new.html.twig', array(
            'office' => $office,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a office entity.
     *
     * @Route("/{officecode}", name="offices_show")
     * @Method("GET")
     */
    public function showAction(Offices $office)
    {
        $deleteForm = $this->createDeleteForm($office);

        return $this->render('offices/show.html.twig', array(
            'office' => $office,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing office entity.
     *
     * @Route("/{officecode}/edit", name="offices_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Offices $office)
    {
        $deleteForm = $this->createDeleteForm($office);
        $editForm = $this->createForm('AppBundle\Form\OfficesType', $office);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('offices_edit', array('officecode' => $office->getOfficecode()));
        }

        return $this->render('offices/edit.html.twig', array(
            'office' => $office,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a office entity.
     *
     * @Route("/{officecode}", name="offices_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Offices $office)
    {
        $form = $this->createDeleteForm($office);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($office);
            $em->flush();
        }

        return $this->redirectToRoute('offices_index');
    }

    /**
     * Creates a form to delete a office entity.
     *
     * @param Offices $office The office entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Offices $office)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('offices_delete', array('officecode' => $office->getOfficecode())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
