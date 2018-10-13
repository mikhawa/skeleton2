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
