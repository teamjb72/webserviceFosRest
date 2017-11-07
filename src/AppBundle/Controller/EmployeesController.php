<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Employees;
use AppBundle\Entity\Offices;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Get;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Form\EmployeesType;


/**
 * Customer controller.
 *
 * @Route("employees")
 */
class EmployeesController extends Controller
{

    /**
     * Finds and displays a employee entity
     * @Get(path = "/employees/{employeenumber}",name="employees_show",requirements = {"employeenumber"="\d+"})
     * @View()
     */
    public function showAction(Employees $employee)
    {
        return $employee;
    }

    /**
     * Lists all employee entities.
     *
     * @Get("/", name="employees_index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $employees = $em->getRepository('AppBundle:Employees')->findAll();

        return $this->render('employees/index.html.twig', array(
            'employees' => $employees,
        ));
    }

    /**
     * Creates a new employee entity.
     *
     * @Post("/new", name="employees_new")
     * @View(
     *     statusCode = 201
     * )
     * @ParamConverter("employee", converter="fos_rest.request_body")
     */
    public function newAction(Employees $employee)
    {


        $office = new Offices();
        $office = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Offices')
            ->find("1");
        $employee->setOfficecode($office);

        $em = $this->getDoctrine()->getManager();
        $em->persist($employee);
        $em->flush();


    }


    /**
     * Displays a form to edit an existing employee entity.
     * modification partiel de la ressource avec PATCH
     *
     *
     * @Rest\View()
     * @Rest\Patch("/{employeenumber}/edit")
     *
     **/

    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $employee = $em->getRepository('AppBundle:Employees')->find($request->get('employeenumber'));
        if (empty($employee)) {
            return new JsonResponse(['message' => 'Employee not found'], Response::HTTP_NOT_FOUND);
        }


        $form = $this->createForm(EmployeesType::class, $employee, [
            'csrf_protection' => false,
        ]);

        $form->submit($request->request->all(),false);

        if ($form->isValid()) {
            $em = $this->get('doctrine.orm.entity_manager');
            // l'entité vient de la base, donc le merge n'est pas nécessaire.
            // il est utilisé juste par soucis de clarté
            $em->merge($employee);
            $em->flush();
            return $employee;
        } else {
            return $form;
        }


    }

    /**
     * Displays a form to edit an existing employee entity.
     * modification complète de la ressource avec PUT
     *
     *
     * @Rest\View()
     * @Rest\Put("/{employeenumber}/put")
     *
     **/

    public function putAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $employee = $em->getRepository('AppBundle:Employees')->find($request->get('employeenumber'));
        if (empty($employee)) {
            return new JsonResponse(['message' => 'Employee not found'], Response::HTTP_NOT_FOUND);
        }


        $form = $this->createForm(EmployeesType::class, $employee, [
            'csrf_protection' => false,
        ]);

        $form->submit($request->request->all());

        if ($form->isValid()) {
            $em = $this->get('doctrine.orm.entity_manager');
            // l'entité vient de la base, donc le merge n'est pas nécessaire.
            // il est utilisé juste par soucis de clarté
            $em->merge($employee);
            $em->flush();
            return $employee;
        } else {
            return $form;
        }


    }

    /**
     * Deletes a employee entity.
     *
     * @Delete("/{employeenumber}/delete", name="employees_delete")
     * @View()
     */
    public function deleteAction(Employees $employee)
    {
        //dump($employee);die;
        $em = $this->getDoctrine()->getManager();
        $em->remove($employee);
        $em->flush();


    }

    /**
     * Creates a form to delete a employee entity.
     *
     * @param Employees $employee The employee entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Employees $employee)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('employees_delete', array('employeenumber' => $employee->getEmployeenumber())))
            ->setMethod('DELETE')
            ->getForm();
    }


}


