<?php

    namespace PageVersionBundle\Controller;

    use Pimcore\Controller\FrontendController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;

    class DefaultController extends FrontendController {
        public function pageVersion(): Response {
            $rootPackageFile = $_SERVER['DOCROOT'] . '/package.json';
            if(file_exists($rootPackageFile)){
                $package = json_decode(file_get_contents($rootPackageFile));
                if(isset($package->version)){
                    return $this->render('@PageVersion/version-label.html.twig', [
                        'appVersion' => 'v'.$package->version
                    ]);
                }
            }
            return new Response('');
        }
    }
