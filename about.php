<?php include('_partials/header.php'); ?>
<body class="contained fixed-nav">
  <?php include('_partials/nav.php'); ?>
  <main>
    <div class="container">
      <div class="row">
        <div class="col-8">
        <br>
        <br>
        <br>
        <h1>About this project</h1>
        <p><b>RDF Beams</b> is a personal research project of <a href="https://www.oeaw.ac.at/acdh/team/current-team/go-sugimoto/" target="_blank">Go Sugimoto</a> of Studio G4I. He works for <a href="https://www.oeaw.ac.at/acdh/" target="_blank">the Austrian Centre for Digital Humanities</a>.
          It is an experimental tool to explore Linked Data (or more specifically Linked Open Data (LOD)). Users simply type a URI of Linked Data (i.e. entity such as a person, place, and object) and they can check how the Linked Data entity is connected to other entities in the Linked Data space. Technically speaking, RDF Beams traverses Linked Data and obtain related data found on the Linked Data network, by following one of the following properties:
          owl:sameAs, rdfs:seeAlso, skos:exactMatch, and schema:sameAs. The tool enables us to have an overview of LOD connectivity and traversability for an instance level. It is useful to invesitgate the quality of Linked Data, which has been in intensive discussions over the last years.
          If Linked Data does not provide sufficient links to external datasets, the consequent services based on Linked Data (i.e. Semantic Web) would not be as valuable as it could be. RDF Beams addresses this issue to help Linked Data implementers and users. More technical details can be found at <a href="technology.php">Tech section</a>.
        </p>
        </div>
        <div class="col-4">
        <figure>
          <img class="jcimage" src="assets/own/images/rdfbeams_lod-cloud.png" />
          <a rel="license" href="http://creativecommons.org/licenses/by/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/88x31.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0 International License</a>
          <figcaption><a href="https://lod-cloud.net/">Source: LOD cloud diagram</a></figcaption>
        </figure>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <h2>The Scope of the Project</h2>
        <h3>Linked Data quality</h3>
        <p>During the last decade, Likned Data has been broadly adopted in the web community. However, more recently the quality of Linked Data has become an issue. Numerous studies suggest
          the challanges of Linked Data quality due to underlying data and deviations of data publishing. In particular, a number of large-scale quantative analyses have been conducted to examine Linked Data quality.
          On the other hand, qualitative analyses and case studies for user scenarios are rather missing. RDF Beams attempts to assist such qualitative analyses for the Linked Open Data quality. We focus on the connectivity and traversability of Linked Data, meaning the software demonstrates how an entity (instance) is connected to other entities.
          For example, if you start with the DBpedia entity of Gustav Klimt (Austrian artist), you will see how it is linked to the same entities from different sources. You may find information about Gustav Klimt from Wikidata, Getty Vocabularies, or BebelNet.
        </p>
        <h3>Multi-level traversing (<i>"Deep Traversal"</i>)</h3>
        <p>There are many Linked Data projects as well as studies on Linked Data quality. Some of them try to take advantage of Linked Data, by connecting and merging information from different data sources.
           However, most of them work on one-level connection, or traversal. A typical example is to aggregate data by following owl:sameAs link. This property allows us to claim that two entites are the same.
           Different data pubishers such as Wikimedia Foundation, Library of Congress, and Paul Getty Institute hold and share different kind of data about Gustav Klimt. Those data can be linked, using owl:sameAs.
           By traversing, we can connect two separate data. However, there are few projects which implement the traversals of several datasets (or graphs). RDF Beams demonstrates multi-level traversals, thus, users are able to jump from one source to another several times.
           We call it "deep traversing".
        </p>
        <h3>Automatisation of data aggregation</h3>
        <p>The goal of this project is to uncover the possibility of Linked Data aggregation. In particular, RDF Beams tries to automate the data aggregation by using standard RDF properties: owl:sameAs, skos:exactMatch, rdf:seeAlso, and schema:sameAs.
        Those properties are widely adopted and a de-facto standard of RDF properties. That implies that, if we specify them, we can automatically fetch all related data about an entity in the Linked Data network. The project would like to provide a tool to investigate how Linked Data can be effectivly reused and aggregated. At the same time, we can analyse what problems need to be resolved to achieve automatic data aggregation.</p>

        <br>
        <h2>Scientific outcomes</h2>
        <p>Hopefully to be announce here:</p>
        <br>
        <h2>Use of RDF Beams</h2>
        <p>RDF Beams is not liable for the correctness of information from the thrid parties (Linked Open Data sources). Data use is subject to the Terms of Use, Privacy Policy, and Copyright Policy of each Linked Open Data sources</a>. For example, you can view <a href="https://meta.wikimedia.org/wiki/Terms_of_use" target="_blank">Wikipedia/Wikimedia terms of use</a>, and <a href="https://wiki.dbpedia.org/terms-privacy" target="_blank">the DBpedia terms of privacy</a> and <a href="https://wiki.dbpedia.org/imprint" target="_blank">imprint</a>.
        The users must abide by all applicable laws and regulations, including intellectual property laws, in connection with the use of RDF Beams, especially when reusing the data presented wtihin the RDF Beams.
        <h2>General copyright of RDF Beams</h2>
        <p>&copy; 2019 Go Sugimoto</p>
        <p><a rel="license" href="http://creativecommons.org/licenses/by/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/88x31.png" /></a><br />The website and the application of RDF Beams is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0 International License</a>.</p>
        <br>
        <h2>Contact</h2>
        <p>If you have any questions, suggestions, bug reports, please feel free to contact:
        <a href="https://www.oeaw.ac.at/acdh/team/current-team/go-sugimoto/" target="_blank">Go Sugimoto</a> of Studio G4I (<a href="https://www.oeaw.ac.at/acdh/" target="_blank">Austrian Centre for Digital Humanities</a>)</p>
        </div>
      </div>
    </div>
  </main>
  <?php include('_partials/footer.php'); ?>
