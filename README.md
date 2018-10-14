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
>    use App\Entity\Rubriques;

>        $entityManager = $this->getDoctrine()->getManager();
>        $rubriques = $entityManager->getRepository(Rubriques::class)->findAll();
>        return $this->render('public/index.html.twig', [
>            'rubriques' => $rubriques,
>        ]);
- menu in template
>    {% block menu %}
>    {% for item in rubriques %}<li class="nav-item"><a class="nav-link" href="idcateg/{{ item.getIdrubriques }}">{{ item.getThertitle >}}  </a></li>
>    {% endfor %}{% endblock %}
### step 12 : recup article
- index in controller:
>    use App\Entity\Rubriques;
>    use App\Entity\Articles;
>    
>    public function index()
>   {
>        $entityManager = $this->getDoctrine()->getManager();
>        $rubriques = $entityManager->getRepository(Rubriques::class)->findAll();
>        $articles = $entityManager->getRepository(Articles::class)->findAll();
>        return $this->render('public/index.html.twig', [
>            'rubriques' => $rubriques,
>            'articles' => $articles,
>        ]);
>    }
- articles in template twig
>    {% for item in articles %}
>        <h2>{{ item.getThetitle }}</h2>
>        <h3>Sections : {% for menu in item.getRubriquesrubriques %}
>    {{menu.getThertitle}} | {% endfor %}</h3>
>    <p>{{ item.getThedescription|slice(0, 300) }} ... </p>
>        <h4>Par {{item.getUsersusers.getThelogin}} <small>le {{ item.getThedate|date("d/m/Y à H:i")}}</small></h4><hr>
>    {% endfor %} 
### step 13 : findAll with ORDER BY
use this => findBy([],['thedate'=>"DESC"])
### strep 14 : Install twig extensions
    composer require twig/extensions
### activate twig extensions
- decomment 
>        Twig\Extensions\TextExtension: ~
in config/packages/twig_extensions.yaml
- use 
>        item.getThedescription|truncate(350, true)
in the template, the words are not cut
### create the complete article system
- create method in PublicController.php
- create view article.html.twig 
### change hard link to article with id
> {{ path('detail_article', {'id':item.getIdarticles}) }}
### create detail_rubrique system
- rubrique() method in controller
- rubrique.html.twig template
! I used for many to many : 
Debug:
> $rubriqueActu = $entityManager->getRepository(Rubriques::class)->find($id);
> $articles = $rubriqueActu->getArticlesarticles();
### create message if not article
> {% if articles is empty %}
>        Pas encore d'articles dans cette section
> {% endif %}
### Export database skeleton2
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
### generate CRUD
for Articles with command:
    php bin/console make:crud Articles
### changing routing to admin
    @Route("/admin/articles")
in Controller/ArticlesController.php
- create a temporary link to the crud in public template

