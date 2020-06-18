@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="my-5">Mentions légales</h1>

{{--        Informations propres au site--}}
        <div class="section mb-5">
            <h2 class="text-white">Informations sur le site</h2>
            <p class="text-white">
                Le site My Starting Five a été créé dans le cadre d'un projet de fin de formation,
                par un groupe de quatre développeurs.
            </p>
        </div>

{{--        Informations concernant l'utilisation des données personnelles--}}
        <div class="section  mb-5">
            <h2 class="text-white">Gestion des données personnelles</h2>
            <p class="text-white">
                MS5 protège vos données personnelles et votre vie privée conformément aux règles européennes et françaises les plus strictes applicables en la matière.
                Les données personnelles saisies par l'utilisateur lors de la création de son compte sont les suivantes : prénom, nom, date de naissance, pseudo, adresse électronique, mot de passe, franchise NBA (facultatif).
                Des données personnelles peuvent aussi être renseignées/modifiées sur la page « profil » : pseudo, email et mote de passe.

                Le seul cookie déposé par notre site concerne l'authentification, via un token.
            </p>
            <br>
            <p class="text-white">
                Les données collectées sont nécessaires pour :

                Créer et gérer votre compte
                Vous contacter suite à une de vos sollicitations ou dans le cadre de l'administration du site
                Vous notifier votre inscription, la création d'une league
            </p>
            <br>
            <p class="text-white">
            Vous pouvez à tout moment modifier vos données sur la page « mon compte ».

            En ce qui concerne la suppression : en application de la loi " Informatique et Libertés "
                du 6 janvier 1978 modifiée, les participants disposent d'un droit d'accès, de modification,
                de rectification et de suppression des données les concernant auprès de l'Organisateur de ce jeu.
                Pour cela, il suffit d'envoyer un email à MyStarting5fr@gmail.com en précisant votre demande.
            </p>
        </div>

        {{--        Informations concernant les éléments publiés par les utilisateurs--}}
        <div class="section  mb-5">
            <h2 class="text-white">Eléments publiés par les utilisateurs</h2>
            <p class="text-white">
                Vous ne devez en aucun cas publier des informations ou commentaires obscènes, menaçants, racistes, ou encore diffamatoires.
            </p>
        </div>

        {{--        Informations concernant les virus et piratages--}}
        <div class="section  mb-5">
            <h2 class="text-white">Malveillance informatique</h2>
            <p class="text-white">
                Vous ne devez pas en aucun cas commettre des agissements délictueux à l'encontre du site notamment
                en introduisant sciemment des virus, chevaux de Troie, vers informatiques, « bombes à retardement »,
                ou tout autre matériel nuisible ou technologiquement dangereux pour le site.
                Vous ne devez pas tenter d'obtenir un accès non autorisé au site, au serveur sur lequel le site est stocké
                ou n'importe quel serveur, ordinateur ou base de données connectés au site.
                Vous ne devez en aucun cas tenter de nuire au bon fonctionnement du site, par une attaque en déni de service.
            </p>
            <br>
            <p class="text-white">
                En violant cette disposition, vous commettez un délit pénal en application des articles 323-1
                et suivants du Code Pénal, relatifs à la répression des atteintes aux systèmes de traitement automatisé
                de données.
            </p>
            <br>
            <p class="text-white">
                La responsabilité de MS5 ne pourra pas être engagée en cas de pertes ou dommages causés par un virus,
                ou tout autre matériel technologiquement nuisible qui pourraient infecter votre équipement informatique,
                vos programmes informatiques, vos données ou autres, en raison de votre utilisation du site ,
                ou contenus que vous aurez publié sur notre site.
            </p>
        </div>

        {{--        Informations sur les aspects juridiques--}}
        <div class="section  mb-5">
            <h2 class="text-white">Application de la loi</h2>
            <p class="text-white">
                Les présentes conditions générales d'utilisation, et tous documents auxquels elles font référence, sont soumis à la loi française.
                <br>
                Les juridictions françaises ont compétence exclusive pour toute action judiciaire dont le fondement est lié
                à une visite sur notre site. Toutefois MS5 se réserve le droit d'engager des poursuites à votre encontre,
                en cas de violation des présentes conditions générales d'utilisation, dans votre pays de résidence
                ou tout autre pays concerné.
            </p>
        </div>

        {{--        Informations sur les réclamations--}}
        <div class="section  mb-5">
            <h2 class="text-white">Réclamations</h2>
            <p class="text-white">
                Si vous avez des réclamations au sujet des données figurant sur le site,
                ou concernant le jeu, vous pouvez nous contacter par email à l'adresse suivante :
                MyStarting5fr@gmail.com, en détaillant l'objet de votre réclamation.
            </p>
        </div>

        {{--        Informations sur les utilisations permises--}}
        <div class="section  mb-5">
            <h2 class="text-white">Restriction d'utilisation</h2>
            <p class="text-white">
                Vous acceptez également de ne pas reproduire, copier ou revendre toute partie du site
                en violation des dispositions des conditions générales d'utilisation du site MPG.
                Vous acceptez également de ne pas accéder sans autorisation, interférer, endommager ou perturber
                une partie du site, tout équipement ou réseau sur lequel le site est stocké,
                tous les logiciels utilisés dans la fourniture du Site, ou tout équipement ou réseau
                ou logiciel appartenant à un tiers ou utilisé par un tiers.
            </p>
        </div>

        {{--        Informations sur les suspensions--}}
        <div class="section  mb-5">
            <h2 class="text-white">Suspensions et bannissement</h2>
            <p class="text-white">
                MS5 déterminera, à sa seule discrétion, s'il y a eu violation de la présente politique d'utilisation
                responsable lors de votre utilisation de notre site. En cas de la violation de cette politique d'utilisation,
                MS5 pourra prendre les mesures appropriées. Sans préjudice de ce qui précède,
                le fait de ne pas se conformer à la présente politique d'utilisation responsable constitue
                une violation substantielle des conditions générales d'utilisation du site aux termes desquelles
                vous êtes autorisé à utiliser le site, et peut entraîner tout ou partie des mesures suivantes :

                le retrait immédiat, temporaire ou permanent de votre droit d'utiliser le site ;
                la suppression immédiate, temporaire ou définitive de tout contenu ou matériel affiché par vous sur le site ;
                l'envoi d'un avertissement ;
            </p>
        </div>

        {{--        Informations sur les modifications du site--}}
        <div class="section  mb-5">
            <h2 class="text-white">Mises à jour et modifications du site</h2>
            <p class="text-white">
                MS5 peut actualiser le Site régulièrement, et peut modifier son contenu à tout moment.
                En cas de nécessité, MS5 se réserve le droit de suspendre l'accès au site, ou de le fermer indéfiniment.
                Tous contenus publiés sur le site peuvent s'avérer ne plus être à jour, à tout moment,
                et MS5 n'a aucune obligation de les actualiser.
            </p>
        </div>
    </div>
@endsection
