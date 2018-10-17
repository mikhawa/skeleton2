# skeleton2
## Symfony 4 Project
### step 1 : install
    composer create-project symfony/website-skeleton skeleton2
### step 2 : security checker
    composer require sensiolabs/security-checker --dev
- verify good version in vendor
### step 3 : create datas
create a mysql database with Workbench
- skeleton2.mwb
- skeleton2-structure.png
- first-export.sql
### step 4 : change .env
with the real DATABASE_URL
### step 5 : create mapping
    php bin/console doctrine:mapping:import App\\Entity annotation --path=src/Entity
### step 6 : generate getters and setters
    php bin/console make:entity App\Entity --regenerate
### step 7 : create a controller
    php bin/console make:controller PublicController
### step 8 : change routing and name
    annotation : @Route("/", name="accueil")
### step 9 : create templates
with Bootstrap 4 CDN into my_template.html.twig
### step 10 : take a basic templapte
from https://startbootstrap.com/
### step 11 : recup menu
- index in controller:
    
        use App\Entity\Rubriques;

        $entityManager = $this->getDoctrine()->getManager();
        $rubriques = $entityManager->getRepository(Rubriques::class)->findAll();
        return $this->render('public/index.html.twig', [
            'rubriques' => $rubriques,
        ]);
- menu in template
    
        {% block menu %}
        {% for item in rubriques %}<li class="nav-item"><a class="nav-link" href="idcateg/{{ item.getIdrubriques }}">{{ item.getThertitle >}}  </a></li>
        {% endfor %}{% endblock %}
### step 12 : recup article
- index in controller:
    
       use App\Entity\Rubriques;
       use App\Entity\Articles;
    
         public function index()
        {
        $entityManager = $this->getDoctrine()->getManager();
        $rubriques = $entityManager->getRepository(Rubriques::class)->findAll();
        $articles = $entityManager->getRepository(Articles::class)->findAll();
        return $this->render('public/index.html.twig', [
            'rubriques' => $rubriques,
            'articles' => $articles,
        ]);
        }
- articles in template twig
    
        {% for item in articles %}
        <h2>{{ item.getThetitle }}</h2>
        <h3>Sections : {% for menu in item.getRubriquesrubriques %}
        {{menu.getThertitle}} | {% endfor %}</h3>
        <p>{{ item.getThedescription|slice(0, 300) }} ... </p>
        <h4>Par {{item.getUsersusers.getThelogin}} <small>le 
        {{ item.getThedate|date("d/m/Y à H:i")}}</small></h4><hr>
        {% endfor %} 
### step 13 : findAll with ORDER BY
use this => findBy([],['thedate'=>"DESC"])
### step 14 : Install twig extensions
    composer require twig/extensions
### step 15 :activate twig extensions
- decomment 
    
       Twig\Extensions\TextExtension: ~
in config/packages/twig_extensions.yaml
- use 
    
       item.getThedescription|truncate(350, true)
in the template, the words are not cut
### step 16 :create the complete article system
- create method in PublicController.php
- create view article.html.twig 
### step 17 :change hard link to article with id
     {{ path('detail_article', {'id':item.getIdarticles}) }}
### step 18 :create detail_rubrique system
- rubrique() method in controller
- rubrique.html.twig template
! I used for many to many : 
Debug:
        
        $rubriqueActu = $entityManager->getRepository(Rubriques::class)->find($id);
        $articles = $rubriqueActu->getArticlesarticles();
### step 19 :create message if not article
 
    {% if articles is empty %}
        Pas encore d'articles dans cette section
    {% endif %}
### step 20 :Export database skeleton2
datas/second-export-datas.sql
### Lu sur internet ;-)
    composer create symfony/website-skeleton monprojet

    composer req admin api

    php bin/console make:controller DefaultController
    php bin/console make:functional-test DefaultControllerTest
    php bin/console make:entity User
    php bin/console make:entity Post
    php bin/console make:command UpdateCommentsStatsCommand
    php bin/console make:voter BlogPostVoter
    php bin/console make:auth FormLoginAuthenticator
    php bin/console make:auth OAuthAuthenticator

Start coding !
and news of Syfony 3 and 4 : https://github.com/pierstoval/livingedge
### step 21 :generate CRUD
for Articles with command:
    php bin/console make:crud Articles
### step 22 :changing routing to admin
    @Route("/admin/articles")
in Controller/ArticlesController.php
- create a temporary link to the crud in public template
- change template with our model
- translate in French
### step 23 : bug's correction "could not be converted to string"
- into src/Entity/Users.php
        
        public function __toString()
        {
            return (string) $this->getThelogin();
        }
- into src/Entity/Rubriques.php
        
        public function __toString()
        {
            return (string) $this->getThertitle();
        }
### step 24 : create indentification

    security:
        # https://symfony.com/doc/current/security.html#where-do-users-come-from-user-providers
        providers:
            in_memory:
                memory:
                    users:
                        ryan:
                            password: ryanpass
                            roles: 'ROLE_USER'
                        admin:
                            password: admin
                            roles: 'ROLE_ADMIN'
    
        firewalls:
            dev:
                pattern: ^/(_(profiler|wdt)|css|images|js)/
                security: false
            main:
                anonymous: ~
                http_basic: ~
    
                # activate different ways to authenticate
    
                # http_basic: true
                # https://symfony.com/doc/current/security.html#a-configuring-how-your-users-will-authenticate
    
                # form_login: true
                # https://symfony.com/doc/current/security/form_login_setup.html
    
        # Easy way to control access for large sections of your site
        # Note: Only the *first* access control that matches will be used
        access_control:
             - { path: ^/admin, roles: ROLE_ADMIN }
            # - { path: ^/profile, roles: ROLE_USER }
        encoders:
            Symfony\Component\Security\Core\User\User: plaintext
            
with securityController:

        namespace App\Controller;
        
        use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
        use Symfony\Component\Routing\Annotation\Route;
        use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
        
        class SecurityController extends AbstractController
        {
            /**
             * @Route("/login", name="login")
             */
            public function login(AuthenticationUtils $authenticationUtils)
            {
                // get the login error if there is one
                $error = $authenticationUtils->getLastAuthenticationError();
        
                // last username entered by the user
                $lastUsername = $authenticationUtils->getLastUsername();
        
                return $this->render('security/index.html.twig', array(
                    'last_username' => $lastUsername,
                    'error'         => $error,
                ));
            }
        }
and security template:

        {% extends 'my_template.html.twig' %}
        
        {% block title %}Hello !{% endblock %}
        
        {% block contenu %}
            {% if error %}
                <div>{{ error.messageKey|trans(error.messageData, 'security') }}</div>
            {% endif %}
        
            <form action="{{ path('login') }}" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="_username" value="{{ last_username }}" />
        
                <label for="password">Password:</label>
                <input type="password" id="password" name="_password" />
        
                <button type="submit">login</button>
            </form>
        {% endblock %}
### step 25 Implement CSRF Protection
    composer require symfony/security-csrf
- config/packages/framework.yaml
        
        framework:
            secret: '%env(APP_SECRET)%'
            #default_locale: en
            csrf_protection: ~
- config/packages/security.yaml

        firewalls:
                dev:
                    pattern: ^/(_(profiler|wdt)|css|images|js)/
                    security: false
                main:
                    anonymous: ~
                    form_login:
                        login_path: login
                        check_path: login
                        csrf_token_generator: security.csrf.token_manager
- in your form template:

        <input type="hidden" name="_csrf_token"
                       value="{{ csrf_token('authenticate') }}"
                >
### step 26 Customize Error Pages
- create  templates/bundles/TwigBundle/Exception/error.html.twig

        {% extends 'my_template.html.twig' %}
        
        {% block contenu %}
            <h1>Page non trouvée</h1>
            <h2>Oups ...</h2>
            <p>
                Votre requête est refusée ou votre page non trouvée <a href="{{ path('accueil') }}">Retour à l'accueil</a>.
            </p>
        {% endblock %}
- change in .env to see the difference:

        #APP_ENV=dev
        APP_ENV=prod
don't forget to use

        php bin/console cache:clear
to see difference 


