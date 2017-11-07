<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Productlines;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Productline controller.
 *
 * @Route("productlines")
 */
class ProductlinesController extends Controller
{
    /**
     * Lists all productline entities.
     *
     * @Route("/", name="productlines_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $productlines = $em->getRepository('AppBundle:Productlines')->findAll();

        return $this->render('productlines/index.html.twig', array(
            'productlines' => $productlines,
        ));
    }

    /**
     * Creates a new productline entity.
     *
     * @Route("/new", name="productlines_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $productline = new Productline();
        $form = $this->createForm('AppBundle\Form\ProductlinesType', $productline);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($productline);
            $em->flush();

            return $this->redirectToRoute('productlines_show', array('productline' => $productline->getProductline()));
        }

        return $this->render('productlines/new.html.twig', array(
            'productline' => $productline,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a productline entity.
     *
     * @Route("/{productline}", name="productlines_show")
     * @Method("GET")
     */
    public function showAction(Productlines $productline)
    {
        $deleteForm = $this->createDeleteForm($productline);

        return $this->render('productlines/show.html.twig', array(
            'productline' => $productline,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing productline entity.
     *
     * @Route("/{productline}/edit", name="productlines_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Productlines $productline)
    {
        $deleteForm = $this->createDeleteForm($productline);
        $editForm = $this->createForm('AppBundle\Form\ProductlinesType', $productline);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('productlines_edit', array('productline' => $productline->getProductline()));
        }

        return $this->render('productlines/edit.html.twig', array(
            'productline' => $productline,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a productline entity.
     *
     * @Route("/{productline}", name="productlines_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Productlines $productline)
    {
        $form = $this->createDeleteForm($productline);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($productline);
            $em->flush();
        }

        return $this->redirectToRoute('productlines_index');
    }

    /**
     * Creates a form to delete a productline entity.
     *
     * @param Productlines $productline The productline entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Productlines $productline)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('productlines_delete', array('productline' => $productline->getProductline())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
