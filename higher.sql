-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-db
-- Generation Time: Feb 21, 2022 at 06:32 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `higher`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` int(11) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `time_to_read` int(11) NOT NULL,
  `subtitle` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `user_id`, `content`, `image_url`, `title`, `color`, `created_at`, `time_to_read`, `subtitle`) VALUES
(2, 8, '<p>All products and services featured are independently chosen by editors. owever, Billboard may receive a commission on orders placed through its retail links, and the retailer may receive certain auditable data for accounting purposes. Black Friday may be over but the savings continue through Black Friday weekend and into Cyber Monday. A number of electronics brands have discounted their top tech products this weekend, with savings of up to $350 on top-rated TVs, headphones, earbuds and smartwatches. Many of these electronics deals feature products that are being discounted for the first time this year, making this weekend a great time to snag those wireless earbus or smart home device you&rsquo;ve been eyeing. From a new $54 Amazon fitness tracker to a $45 AirPods dupe, we&rsquo;ve rounded up the best tech and electronics deals to shop this Black Friday weekend. Quantities are starting to run out so we recommend adding to cart now. $101 off Sony WH-1000XM4 Wireless Headphone Sony WH-1000XM4 Wireless Shop: Sony WH-1000XM4 Wireless Noise-Cancelling Headphones $248 One of the best Black Friday weekend deals is on the Sony WH-1000XM4 Wireless Headphones &mdash; the top-rated noise-cancelling headphones on the market today. Regularly $349+, the headphones are on sale for just $248 &mdash; the lowest price we&rsquo;ve seen for these cans all year. See the deal here. $40 off Echo Show 5</p>', 'uploads/covers/blackfriday3f40b8c4d896c9effe21debfb47d4812.png', 'The Best Black Friday Weekend Tech and Electronics Deals', 3, '2022-02-19 06:44:38', 6, 'Best deals ever.'),
(5, 9, '<p>&nbsp;</p>\r\n<p>Python&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Python is among the most used and in-demand programming languages in 2021 and still is on top of the charts in 2022. According to Octoparse (2021), Python is a programming language that is widely used for general-purpose programming.&nbsp;&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>A noteworthy aspect to talk about with Python is that it gives emphasis on code readability and a syntax allowing developers to display their program in fewer lines of code as compared to other programming languages.&nbsp;&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>The average annual pay of a Python developer is: $107,311 (average is based on Indeed &amp; Glassdoor Job postings with the help of multiple sources).&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>C&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>C is one of the programming languages that many programmers are well-versed and familiar with, probably because this is also among the oldest of the programming languages. Notably, this was once used by Apple for their iOS operating systems.&nbsp;&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>The average annual pay of a C developer is: $86,296 (average is based on Indeed &amp; Glassdoor Job postings with the help of multiple sources).&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>C++&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Slightly similar to Python with regard to general-purpose programming, C++ is another programming language included in the list. It provides facilities for low-level memory manipulation.&nbsp;&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>The average annual pay of a C++ developer is: $96,371 (average is based on Indeed &amp; Glassdoor Job postings with the help of multiple sources).&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Go&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Developed by Google, Go is an open-source programming language that was built primarily for speed.&nbsp;&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>While having a peculiar error handling, it makes up for its effectivity despite the unusual way of handling error. It has up to date libraries built for more efficient coding and programming within the language.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Go is among the fastest programming languages in 2022.&nbsp;&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>The average annual pay of a Go developer is: $105,078 (average is based on Indeed &amp; Glassdoor Job postings with the help of multiple sources).&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Ruby&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Ruby belongs to the most in-demand and highest paid programming languages in 2022. It is an open-source programming language that is dynamic and is built on simplicity and productivity.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Its syntax is elegant making coding a much more natural and seamless process and also making the code easy to read and write.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>The average annual pay of a Ruby developer is: $117,868 (average is based on Indeed &amp; Glassdoor Job postings with the help of multiple sources).&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Java&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Java is one of the most popular programming languages in the globe. Java is built specifically for client-server web applications with about 9 million developers making use of the language.&nbsp;&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Java is the main language used behind Android, and owns about 85% of the mobile market. While several sources saying that it is typically harder to learn than Python, it is relatively easier than C or C++.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>The average annual pay of a Java developer is: $94,502 (average is based on Indeed &amp; Glassdoor Job postings with the help of multiple sources).&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>JavaScript&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Along HTML and CSS, JavaScript covers a portion of the core technologies in the World Wide Web production.&nbsp;&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>JavaScript is used to make webpages interactive and more inclusive of a variety of programs like video games. While many people misconstrue JavaScript and Java as the same programming language, they are different.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>The average annual pay of a JavaScript developer is: $107,384 (average is based on Indeed &amp; Glassdoor Job postings with the help of multiple sources).&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>PHP&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>PHP is a server-side scripting language designed primarily for web development but in some instances, it is also used for general-purpose programming.&nbsp;&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>PHP can be embedded into HTML and is extremely user-friendly for new developers. While PHP is particularly easy to learn, it does not shy away from advanced features for more experienced programmers in the language.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>The average annual pay of a PHP developer is: $102,717 (average is based on Indeed &amp; Glassdoor Job postings with the help of multiple sources).&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Conclusion&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Based on our research, Ruby takes first place for highest paid programming jobs for 2022, but don&rsquo;t just take our word for it. There are other factors that naturally come into play such as experience, soft skills, seniority, etc.&nbsp;&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Software developers have been in high demand and the trend doesn&rsquo;t show any signs of slowing down any time soon. So, whichever programming language you choose or are interested in, there is always enough choices and room for everyone.&nbsp;&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>The compiled list of salaries was averaged from the given sources and does not reflect the global pay of each programming language. Moreover, this blog does not represent ALL the highest-paying programming languages. We compiled only the most notable programming languages from the said sources.&nbsp;&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>References:&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>SharePointCafe (2021). High salary paying programming languages in 2021-2022. https://www.sharepointcafe.net/2021/12/high-salary-paying-programming-languages.html?utm_source=rss&amp;utm_medium=rss&amp;utm_campaign=high-salary-paying-programming-languages&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Octoparse (2021). 15 highest paying programming languages in 2021. https://www.octoparse.com/blog/15-highest-paying-programming-languages-in-2017&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Whitney, Lance (2021). The best programming languages to learn in 2022. TechRepublic. https://www.techrepublic.com/article/the-best-programming-languages-to-learn-in-2022/ </p>', 'uploads/covers/photo-1603302576837-37561b2e2302afc65faa93fe23a9e0ec25a6dc7bbcfa.jpg', 'Top Highest Paid Programming Languages in 2022', 3, '2022-02-19 17:22:56', 12, 'Check if your language is on the list.'),
(6, 8, '<p>Who hasn&rsquo;t stolen a cookie from the jar when Mom wasn&rsquo;t looking?</p>\r\n<p>Or stayed out with friends long after bedtime?</p>\r\n<p>Or &mdash; God forbid &mdash; taken the shortcut through the park where shady people lurk, instead of going the long way over the main road?</p>\r\n<p>Or, yes oh yes, which programmer hasn&rsquo;t violated one of those etched-in-stone best practices, you know, one of the ones that you should follow at all costs?</p>\r\n<p>It&rsquo;s safe to say that many, if not most, of us have done this before. But maybe your rule-breaking is exactly why your code was better than average. At least it didn&rsquo;t make you lose your job. Or make your computer explode at runtime.</p>\r\n<p>Sure, breaking rules is never without risk. If you&rsquo;re a brain surgeon, you really should follow the rule of &ldquo;never cut this piece off.&rdquo; (Forgive me for my bluntness, I&rsquo;m no medical expert.)</p>\r\n<p>But if you&rsquo;re building software, what&rsquo;s the worst case? Sure, if you&rsquo;re designing killer drones or software for electric grids or support systems for spaceships you might want to go slow and follow the rules.</p>\r\n<p>But those programmers who don&rsquo;t have high stakes like that &mdash; and that&rsquo;s most of us &mdash; you might want to question your rulebook from time to time.</p>\r\n<p>Copy-pasting code isn&rsquo;t the root of all evil</p>\r\n<p>The die-hard open-sourcers and the die-hard purists may argue otherwise. But, in all earnesty, who hasn&rsquo;t copy-pasted code snippets from StackOverflow and other places of the big wide internet?</p>\r\n<p>First of all, if you have a problem that takes five seconds to google, you wouldn&rsquo;t go annoy your coworker for ten minutes to make them fix it. And if the answer is on Stack, then, well, the answer is there.</p>\r\n<p>The purists would argue that you shouldn&rsquo;t copy anything because you might not understand what&rsquo;s going on in the copied code. And they have a point.</p>\r\n<p>But if you&rsquo;re googling around anyway, you&rsquo;re quite likely going to check the manual pages of the function that you&rsquo;re copying over anyway. Plus, you&rsquo;re probably going to need to adjust a few variable names and understand where to put that snippet of code. That&rsquo;s not possible without a minimum of understanding.</p>\r\n<p>Another point for the purists is that your ready-to-copy-paste code may contain non-printable characters. These are characters like a backspace or a horizontal tab that you can&rsquo;t see on your screen, but that can have an effect on the output anyway.</p>\r\n<p>Purists would therefore argue that if you&rsquo;re going to copy code, at least type it yourself so you don&rsquo;t accidentally copy non-printable characters and make a mess of your project.</p>\r\n<p>That&rsquo;s cool advice, but personally I don&rsquo;t know anyone who has ever bumped into a non-printable character and messed up their code. I do know someone, though, who introduces typos everywhere: me.</p>', 'uploads/covers/python-code-1-720x600cc4b078fa8e6d25eb6441af24e82a749.jpg', 'Following programming ‘best practices’ will slow you down', 4, '2022-02-19 17:52:14', 4, 'There is always something to improve.'),
(7, 7, '<p>Following two years of travel restrictions, we are more than ready to get out there and explore the world. And with a growing number of people booking solo trips, it seems many don&rsquo;t want to wait around for others to explore the countries on their bucket list.</p>\r\n<p>According to tour specialists Explore, around 60 per cent of bookings in 2022 are for solo travellers so far - up 27 per cent from pre-pandemic levels. The number of people joining small group trips has risen sharply over the last two years.</p>\r\n<p>But if you are looking to go abroad by yourself, there are more things to consider. To help guide those looking for the perfect destination, price comparison website Uswitch looked at a whole host of factors to judge which were the top cities for solo travellers.</p>\r\n<p>From the most thrilling activities you can take part in, toLGBT+ friendliness and even crime ratings, the company ranked places across the globe to find out which came out on top for lone backpackers.</p>\r\n<p>7. Dubai, United Arab Emirates</p>\r\n<p>With an average temperature of 28C, Dubai has year-round sunshine and is the warmest destination on the list. It&rsquo;s one to consider if you are looking to get away from Europe&rsquo;s cold, wet winters.</p>\r\n<p>There is also a whole range of things to do in this bustling city with 2,579 different activities to take up your time while travelling alone. From gorgeous beaches and futuristic skyscrapers to malls and giant aquariums, it has enough attractions to keep you busy whether you are staying for a few days or a couple of weeks.</p>\r\n<p>If you are planning a visit then it is worth checking out a Dubai Explorer Pass. This will allow you pre-paid access to 48 of the city&rsquo;s attractions.</p>\r\n<p>6. Athens, Greece</p>\r\n<p>Athens is a good choice if you are looking for a solo backpacking destination a bit closer to home. Keeping in touch with friends and family while you are away is easy here with fast average internet speeds.</p>\r\n<p>But, with thousands of attractions from the famous Acropolis to the ancient district of Plaka, you might be too busy to stay on top of news from back home. Athens has more than 1,800 different activities to choose from when looking for things to fill up your time in the city.</p>\r\n<p>Average temperatures in the city are around 14C but, if you want to escape the heat of summer and have a peak cultural experience, then Easter is the best time to visit. Celebrations are often bigger than Christmas - with candle-lit services, food and processions throughout the city.</p>\r\n<p>5. Jaipur, India</p>\r\n<p>Jaipur has the cheapest public transport on the list costing as little as 24 cents. Perfect if you are backpacking on a budget. There are lots of low-cost street food and restaurant options too so no need to worry about feeding yourself when on a solo trip.</p>\r\n<p>It\'s also pretty warm in this Indian city. Average temperatures of 25C mean you can explore the city&rsquo;s impressive architecture without getting cold.</p>\r\n<p>Painted to impress Prince Albert during his tour of India in 1876, Jaipur is known as the &lsquo;Pink City&rsquo;. Now, 140 years later, there is still a law in place making it illegal to change the shade of its buildings. With hundreds of historical sites from palaces and forts to opulent gardens, you won&rsquo;t be short of things to do as a solo traveller.</p>\r\n<p>4. Istanbul, Turkey</p>\r\n<p>There are tons of places to choose from when looking for accommodation in Istanbul. Uswitch&rsquo;s index found 5,611 options for solo travellers to take their pick. The district of Sultanahmet is a great location for first-time visitors with lots of hostels.</p>\r\n<p>This massive city hub at the crossroad of Europe and Asia is also cheap to travel around. Transport costs can be as low as 25 cents so you can easily plan a route around the nearly 2,000 attractions.</p>\r\n<p>Full of cultural and historic experiences, probably one of the most iconic places to visit in Istanbul is the Hagia Sophia. Built in the 6th century, the monument reflects its changing religious history with minarets and Islamic inscriptions alongside Christian mosaics.</p>\r\n<p>3. Bangkok, Thailand</p>\r\n<p>The capital city of Thailand takes the third spot in the rankings. Known for its street life and cultural landmarks, it perhaps isn&rsquo;t surprising that Bangkok is a top destination for solo travellers.</p>\r\n<p>With more than 4,000 options for places to stay, you won&rsquo;t struggle to find somewhere to rest your head. The Banglamphu area of the city is particularly aimed at backpackers travelling on a tight budget but if you are looking for a more luxurious experience then check out Silom.</p>\r\n<p>Getting around the city also won&rsquo;t break the bank. Transport can cost as little as &euro;1 with the business district well served by a subway and sky train network, a rapid transport system that is elevated above the streets. Other parts of Bangkok are covered by an extended bus network and famous tuk-tuks are available almost everywhere.</p>\r\n<p>2. New Delhi, India</p>\r\n<p>Transport in New Delhi costs as little as 50 cents making it the perfect place to explore on your own.</p>\r\n<p>There are an impressive 5,269 tours and sightseeing opportunities and 5,830 activities for tourists in the city. Highlights include the two square kilometres Red Fort, or Lal Qila, built in 1648. It is a stunning architectural gem with crescent-shaped red sandstone walls that are surrounded by a moat.</p>\r\n<p>If you&rsquo;ve packed light then don&rsquo;t worry about a jacket. The average temperature in the city is a balmy 27C.</p>\r\n<p>1. Rome, Italy</p>\r\n<p>Rome came out as the top place to visit for solo backpackers. With the highest number of places to stay and most activities to choose from, it\'s unlikely you&rsquo;ll get bored in Italy&rsquo;s capital city.</p>\r\n<p>On top of that, the accommodation in this city had some of the highest ratings of any destination in the index. With an average hostel costing around &euro;20 a night, it&rsquo;s reasonably priced too.</p>\r\n<p>Rome is a huge city full of history, culture and food so there is plenty for you to discover. To keep travel costs low, look at purchasing a pass for public transport to make your way around this metropolitan centre.</p>', 'uploads/covers/travelea64e242c6f0515cfd4e577d63863a08.png', 'Travelling alone? Here are seven of the best cities for solo backpackers', 1, '2022-02-19 17:58:32', 9, 'Best  tips for backpackers.'),
(8, 8, '<p>A do-it-yourself remodel can be a budget-friendly way to freshen up your home. For some projects, it may take just a few YouTube videos to show you how to modernize your space.</p>\r\n<p>But not every project is right for amateur renovators. Your skill level, budget and how important the project is to your home&rsquo;s value can all be deciding factors in whether to call a professional.</p>\r\n<p>Here are home remodel projects you can probably DIY, and those that are better left to experts.</p>\r\n<p>DIY THE FLOORS AND WALLS</p>\r\n<p>Aminah Chung and her husband Bernard, who share their DIY projects on social media, updated their Phoenix-area home&rsquo;s master bedroom and pantry, and built a playhouse for their kids.</p>\r\n<p>Starting in small spaces or trying simple changes, like paint or paneling on a wall, can help you build confidence for bigger rooms, Aminah Chung says.</p>\r\n<p>With a little extra research, installing new floors can be a spare-time project, says San Diego-based DIYer Liz Lovery. She and her husband, a former structural engineer, installed laminate flooring in their home.</p>\r\n<p>&ldquo;Things like that might feel overwhelming, but they aren&rsquo;t,&rdquo; she says. &ldquo;They&rsquo;re very attainable, and it can actually save you a lot of money in the long run.&rdquo;</p>\r\n<p>Tools can be a significant portion of your DIY budget, says Chris Egner, president of the National Association of the Remodeling Industry. Add those costs to your budget, and ask if the tools are worth the investment, he says.</p>\r\n<p>USE CAUTION IN KITCHENS AND BATHROOMS</p>\r\n<p>Homeowners should consider their skills before committing to a full DIY kitchen or bathroom remodel, Lovery says, because those spaces are often essential to your home&rsquo;s value.</p>\r\n<p>Some things, like painting the cabinets, may be within reach. But if you need new cabinets installed and you don&rsquo;t feel confident about accurately measuring for them, Lovery says it may be worth using a professional to get a quality finished product.</p>\r\n<p>Using a contractor for a kitchen or bath remodel might cost tens of thousands of dollars, but Egner says their knowledge of building codes and design best practices may end up saving you money because they&rsquo;ll do the job correctly.</p>\r\n<p>A designer can show you multiple options for a new layout and predict possible issues down the line, says Kevin Brown, design manager with Sunnyfields, a Baltimore-based kitchen and bath remodeling company.</p>\r\n<p>The project may also finish faster, Brown says, since a professional can coordinate electricians and plumbers, avoiding &ldquo;a real nightmare&rdquo; of potential delays if you do it yourself.</p>\r\n<p>The Chungs have two kids and full-time jobs, so a DIY kitchen remodel would take a lot longer, Aminah Chung says.</p>\r\n<p>&ldquo;I believe in doing the projects that you can do so that you can save the money for the projects you don&rsquo;t necessarily want to do,&rdquo; she says.</p>\r\n<p>OUTSOURCE PLUMBING, HVAC, ELECTRICAL WORK</p>\r\n<p>It&rsquo;s best to let experts handle systems that make your house function, like the electrical, plumbing and HVAC system, Egner says. This work often involves permits and background knowledge, and the cost of a misstep can be high.</p>\r\n<p>&ldquo;A simple mistake in an installation of a toilet or a faucet could lead to thousands and thousands if not tens of thousands of dollars worth of damage,&rdquo; he says.</p>\r\n<p>Lovery is willing to knock down walls in her home, but she makes room in her budget to outsource some work, saving potential headaches down the road.</p>\r\n<p>&ldquo;When it comes to those very niche trades it&rsquo;s really, really nice to throw in the towel and hire out those jobs,&rdquo; she says.</p>\r\n<p>MANAGING HOME IMPROVEMENT COSTS</p>\r\n<p>If you&rsquo;re still undecided, have a contractor write up an estimate and compare it with your DIY budget, Egner says. You can search for professionals on the NARI website.</p>\r\n<p>He also recommends adding about 10 to 20 percent to your budget for unexpected expenses, which are inevitable with DIY and professional projects.</p>\r\n<p>Cash is the interest-free way to pay for home improvement projects, but if you don&rsquo;t have enough available, shop around to find the best financing.</p>\r\n<p>Home equity loans and lines of credit offer low interest rates and long repayment terms, which keep monthly payments low, but it could take a few weeks to a month to get approved.</p>\r\n<p>Personal loans have higher rates and shorter repayment terms, meaning your monthly payments are higher, but the debt is often cleared sooner. With these loans, you can typically get funds in a week or less.</p>\r\n<p>RELATED LINKS:</p>\r\n<p>National Association of the Remodeling Industry: Find a NARI Remodeler https://remodelingdoner ight.nari.org/remodelers</p>\r\n<p>NerdWallet: How do home improvement loans work? https://bit.ly/nerdwallet-how-home-improve ment-loans-work</p>\r\n<p>Copyright 2022 The Associated Press. All rights reserved. This material may not be published, broadcast, rewritten or redistributed without permission.</p>', 'uploads/covers/diy-pallet-beefy-pallet-outdoor-sitting-benche22bcb75b1ba1210839d67f7a2532426.jpg', 'DIY or call a professional: Which is right for your remodel?', 2, '2022-02-20 18:18:19', 11, 'You might be suprised!'),
(9, 8, '<p>Beauty and skincare take time and perseverance-- dedication is the key to achieve healthy, smooth and supple skin.</p>\r\n<p>While skincare trends keep changing, DIY face masks or masks made at home from scratch have long been a popular choice. Did you ever wonder about the efficacy?</p>\r\n<p class=\"custom_read_button\">ALSO READ |Study suggests medical masks increase &lsquo;facial attractiveness&rsquo; more than other face coverings</p>\r\n<p>Dermatologist Dr Geetika Mittal Gupta took to Instagram to shed some light on the usefulness of DIY masks (and their ingredients) and said, \"Do you love DIY masks? Are you using ingredients from your kitchen? Stop now ❌\". Take a look at the post here:</p>\r\n<p>While DIY masks made from pantry essentials are easy to make and cost-effective, they provide no long term solution for skincare concerns. Topical application of masks which contain natural ingredients \"can react with UVA rays, causing blisters, infections and sensitivities\", explained the doctor.</p>\r\n<p>Take a look at a list of ingredients that are a strict no-no for your skin:</p>\r\n<p>Lemon</p>\r\n<p>While rich in vitamin C, lemons shouldn\'t be used in DIY masks. They contain citric acid which, when applied topically, may cause irritation among people who have sensitive skin. According to Healthline, applying lemon juice on the face can also lead to phytophotodermatitis, a type of skin reaction to citrus fruits. When applied topically, lemon juice may also increase your chances of getting sunburnt.</p>\r\n<p>Cinnamon</p>\r\n<p>A spice rich in antioxidants, cinnamon is especially popular in the holiday season for it\'s warm and comforting flavour. But, it is not good for DIY face masks. According to Healthline, applying cinnamon to the skin may also cause \"redness and irritation\". Sensitive-skinned people should steer clear of it.</p>\r\n<p>Apple cider vinegar</p>\r\n<p>Lately, apple cider vinegar has turned out to be a popular remedy for skin conditions. The fermented concoction, however, is highly acidic and can disrupt the skin\'s natural barrier. According to Medical News Today, apple cider vinegar, when overused in some cases, can harm the body by causing chemical burns.</p>\r\n<p class=\"custom_read_button\">IN PREMIUM NOW |The 5:2 diet: A popular way of intermittent fasting to lose weight</p>\r\n<p>Vegetable oil</p>\r\n<p>Use of vegetable oils in skincare has been popular from time immemorial, but caution must be taken to prevent any untoward incidents. Everyone\'s skin type is different and hence, what may have worked for someone, may not for someone else. In a 2017 study titled \'Use of vegetable oils in dermatology: an overview\' published in the International Journal of Dermatology, it said that while there were few reported adverse effects of vegetable oils, cases of contact dermatitis, pityriasis rosea-like eruption, lichenoid dermatitis etc. were noted.</p>', 'uploads/covers/HealthBlocks6026326d5b9ff0cb541463696786795e.png', 'DIY masks: Five ingredients you shouldn’t be applying to your face', 1, '2022-02-20 18:22:51', 7, 'One you might be using every day'),
(10, 7, '<p>There was a hot second last year where the red flag emoji was literally everywhere. It seemed as if people were collectively, feverishly tweeting, Instagramming, and TikToking all the things that they deemed to be warning signs, particularly when it comes to relationship red flags.</p>\r\n<p>And while it may have been fun to jump on the trend and LOL about it, it seems like the term \"red flag\" has stepped into misuse territory. There\'s a confusion between what constitutes an actual relationship red flag&nbsp;(e.g., lack of conflict resolution or overly jealous and insecure) versus just not vibing with them. Hey, just because you don\'t mesh with someone doesn\'t mean they\'re a bad person! They\'re just not your type of person, and that\'s totally cool.&nbsp;</p>\r\n<p>To help clear up the red flag confusion, below, Christie Kederian, EdD, LMFT, a psychologist and licensed marriage and family therapist, shares five common issues that aren\'t necessarily relationship red flags.&nbsp;</p>\r\n<p>1. Difficult or dysfunctional family dynamics</p>\r\n<p>If someone experienced a challenging upbringing, lacked a healthy home environment, or had toxic family dynamics, people often think that is a red flag in a potential partner. However, Dr. Kederian points out that that\'s not always the case. After all, your past doesn\'t define who you are as a person or how you show in a relationship. What\'s most important, she says, is how they have processed, grown, and healed from those negative experiences. Dr. Kederian says this is truly not a red flag if they\'ve gone to therapy to process their childhood, attachment, and relationships and can speak authentically about their family without becoming emotionally dysregulated.&nbsp;</p>\r\n<p>2. A nonexistent or extensive&nbsp;relationship history</p>\r\n<p>If you\'re on a first date with someone and learn they haven\'t had many serious relationships in the past, that may raise some eyebrows. The same goes for the opposite. If they\'ve been in too many serious relationships, people can interpret that as a relationship red flag. But again, Dr. Kederian reminds us not to judge someone by their past. \"The reality is every person is different, and every relationship is different,\" she says, adding that what\'s most important is how they speak about their past relationships. \"If they acknowledge the dynamic, personal responsibility, and the role they may have played, this is a good sign that it\'s not truly a red flag.&rdquo;</p>\r\n<p>3. Practicing sobriety</p>\r\n<p>Someone\'s sobriety isn\'t necessarily a red flag either. \"Many people prefer not to date anyone that struggled with an addiction of any kind, and while that may be valid, they may be missing out on amazing potential partners that have done the work in a 12-step program and have grown, are more mature, and emotionally available than people who haven\'t done the work,\" Dr. Kederian says. She adds that you\'ll know someone\'s sobriety isn\'t a red flag if they can speak openly about their recovery and they\'re partaking in some sort of treatment or therapy or are actively involved in a community that provides support and connection.&nbsp;</p>\r\n<p>4. Dislike their work or aren&rsquo;t &ldquo;successful&rdquo; by societal standards</p>\r\n<p>Looking for a partner who has a great job and career achievement is reasonable, especially if you prioritize those values. That said, Dr. Kederian recommends not being too quick to raise the red flag if they don\'t quite measure up to those expectations&mdash;there still may be tons of love and relationship potential there.&nbsp;</p>\r\n<p>\"Sometimes people put too much weight on if someone loves their work or not, or has \'arrived\' at some standard of success when often it\'s people\'s drive, ambition, and character [that] can be more important when it comes to a long-lasting and happy relationship,\" she says. \"Financial stability and responsibility is important, but it\'s not so important that you should count someone out. If you notice that they speak passionately about their hobbies, can balance disliking work with having other goals, and are very well-connected otherwise, this isn\'t a red flag.\"</p>\r\n<p>5. Have been in a toxic relationship</p>\r\n<p>The fact that someone has been in a toxic and unhealthy relationship in the past isn\'t in and of itself a relationship red flag. Here is what is important: \"It\'s more about the growth they\'ve done to understand the experience and dynamics and healing they\'ve received to be ready for a relationship,\" Dr. Kederian explains, adding that the most-common reason a person stays in a relationship with a toxic ex is if they struggle with their own self-esteem and self-worth. So, according to Dr. Kederian, green flags include having done the inner work to move past the relationship in therapy, speaking highly of themselves, and being attracted to healthier relationship dynamics.</p>\r\n<p>Oh hi! You look like someone who loves free workouts, discounts for cutting-edge wellness brands, and exclusive Well+Good content. Sign up for Well+, our online community of wellness insiders, and unlock your rewards instantly. </p>', 'uploads/covers/Relationshipbee190c392897f17008375605c31da5e.png', 'Not So Fast—These 5 Common Issues Aren’t Relationship Red Flags After All', 1, '2022-02-21 06:24:42', 8, 'Broke up again?'),
(11, 7, '<p>Charlotte Latvala</p>\r\n<p>I peered into the slow cooker, still teeming with leftover pork and sauerkraut.</p>\r\n<p>&ldquo;We can eat it again tomorrow,&rdquo; I said, without much enthusiasm.</p>\r\n<p>&ldquo;We could,&rdquo; said my husband, with even less enthusiasm.</p>\r\n<p>&ldquo;Or maybe we can freeze it. Can you freeze sauerkraut?&rdquo;</p>\r\n<p>We debated the pros and cons of freezing briny cabbage for about 20 minutes. (And yes, young couples, this is what it comes to, 30 years down the line &mdash; you spend entire evenings having conversations like this, meanwhile pretending Google doesn&rsquo;t exist.)</p>\r\n<p>We landed in Empty Nest Territory six months ago, when our youngest child left for college. Many changes, large and small, ensued.</p>\r\n<p>We have much less laundry. Things stay (relatively) neat and tidy. I&rsquo;m not constantly picking up half-empty water bottles, or waking to a kitchen littered with last night&rsquo;s Sheetz debris.</p>\r\n<p>On the other hand, there&rsquo;s way more food. So much food. Mountains of leftovers, all the time. Fruit, rotting before we can eat it. Bags of tortilla chips, turning stale before we can get to the bottom.</p>\r\n<p>It&rsquo;s the oldest empty nest cliche in the book: I haven&rsquo;t figured out how to cook for two instead of five. I&rsquo;m still happily strolling the aisles at Costco, tossing mega-containers of spinach and pasta and organic ground beef into the cart, not quite comprehending that I&rsquo;m no longer providing provisions for the entire French Foreign Legion.</p>\r\n<p>In my logical mind, I know it&rsquo;s just the two of us now. But my food mind hasn&rsquo;t caught up.</p>\r\n<p>I still want to have plenty in case someone wants seconds. Or, what if one of the kids comes home for dinner? (As they are 100, 500, and 2,500 miles away, this is unlikely. But possible! And what if one of them brings a friend? Or two? It would be awful not to have enough food.)</p>\r\n<p>And of course, it&rsquo;s important to have a full pantry. It makes me feel secure. Just in case one of those late-February early-March snowstorms comes along. Or there&rsquo;s another COVID spike, or worsening chain supply issues. Or aliens abduct all the Chipotle workers and a chicken bowl is out of the question.</p>\r\n<p>Story continues</p>\r\n<p>Also, cooking at home is good! I need to do it! It&rsquo;s healthier, it&rsquo;s cheaper, and although we wiggled through COVID Times with the excuse &ldquo;We&rsquo;re supporting local businesses!&rdquo; we can&rsquo;t go on ordering takeout six nights a week. It&rsquo;s, as the kids say, unsustainable.</p>\r\n<p>Still.</p>\r\n<p>I opened the freezer the other day and was shocked to find it crammed with containers of leftovers. I picked one up and puzzled over its contents. Chili? Spaghetti sauce? My famous (but mostly unpopular) Caribbean chicken stew?</p>\r\n<p>&ldquo;I need to scale back,&rdquo; I thought, squinting at a container that appeared to be a lump of gravel covered with shards of ice.</p>\r\n<p>Or at the very least, we need to start chipping away at these leftovers.</p>\r\n<p>I wonder: What wine pairs best with freezer burn?</p>\r\n<p>Charlotte is a columnist for The Times. You can reach her at charlottelatvala@gmail.com.</p>\r\n<p>This article originally appeared on Beaver County Times: Latvala: Finding recipe for cooking for fewer mouths</p>', 'uploads/covers/cooking1f9c586f426c873bb674c98a152e0119.jpg', 'Charlotte Latvala: Finding recipe for cooking for fewer mouths', 3, '2022-02-21 07:07:03', 7, 'Her receipes are back');

-- --------------------------------------------------------

--
-- Table structure for table `article_tag`
--

CREATE TABLE `article_tag` (
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_tag`
--

INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES
(2, 43),
(5, 37),
(6, 37),
(6, 43),
(7, 44),
(7, 50),
(7, 51),
(8, 36),
(8, 41),
(8, 44),
(9, 48),
(9, 51),
(10, 35),
(10, 51),
(11, 38),
(11, 42),
(11, 44);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `article_id` int(11) NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `article_id`, `content`, `created_at`) VALUES
(1, 7, 8, 'This is comment example.', '2022-02-21 07:04:49'),
(2, 7, 9, 'This is sample comment', '2022-02-21 14:41:18'),
(3, 7, 9, 'And another one', '2022-02-21 14:41:39');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220219064019', '2022-02-19 06:41:26', 3084),
('DoctrineMigrations\\Version20220221074619', '2022-02-21 07:46:29', 595);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `tag_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `tag_title`) VALUES
(35, 'Relationships'),
(36, 'Science'),
(37, 'Programming'),
(38, 'Productivity'),
(39, 'Machine Learning'),
(40, 'Politics'),
(41, 'DIY'),
(42, 'Cooking'),
(43, 'Electronics'),
(44, 'Hobby'),
(45, 'Gardening'),
(46, 'Parenting'),
(47, 'History'),
(48, 'Biology'),
(49, 'Music'),
(50, 'Travelling'),
(51, 'Health');

-- --------------------------------------------------------

--
-- Table structure for table `tag_article`
--

CREATE TABLE `tag_article` (
  `tag_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_url` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `first_name`, `last_name`, `photo_url`, `bio`) VALUES
(7, 'johnmurphy@user.com', '[]', '$2y$13$nojA/Gex6sr0w/8YNOoQrOG8cOz46XKKz6Dqam587GLzFVWjwIjem', 'John', 'Murphy', 'uploads/users/christian-buehner-DItYlc26zVI-unsplash.jpg', NULL),
(8, 'andreajackson@user.com', '[]', '$2y$13$XceEdYQ6JGOeUY/4HyXLEe5hwgW6C5/7Xnv9sicUWd3cvfDAJ75t6', 'Andrea', 'Jackson', 'uploads/users/jessica-felicio-_cvwXhGqG-o-unsplash49d1c036298d561f17ce8b1391db1d77.jpg', NULL),
(9, 'robertedwin@user.com', '[]', '$2y$13$keF757eCq/9p0FWxjgFJaObRTAqYi672jodYWyP/uHhPZnfoyrEl6', 'Robert', 'Edwin', 'uploads/users/ben-parker-OhKElOkQ3RE-unsplash.jpg', NULL),
(10, 'admin@admin.com', '[\"ROLE_ADMIN\"]', '$2y$13$sNMmn6bUeKDDB1fMmlkOweUQ3WvsnGnByjIxqCvZQpq1W1U5eepdy', 'Admin', 'Admin', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_23A0E66A76ED395` (`user_id`);

--
-- Indexes for table `article_tag`
--
ALTER TABLE `article_tag`
  ADD PRIMARY KEY (`article_id`,`tag_id`),
  ADD KEY `IDX_919694F97294869C` (`article_id`),
  ADD KEY `IDX_919694F9BAD26311` (`tag_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9474526CA76ED395` (`user_id`),
  ADD KEY `IDX_9474526C7294869C` (`article_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_article`
--
ALTER TABLE `tag_article`
  ADD PRIMARY KEY (`tag_id`,`article_id`),
  ADD KEY `IDX_300B23CCBAD26311` (`tag_id`),
  ADD KEY `IDX_300B23CC7294869C` (`article_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_23A0E66A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `article_tag`
--
ALTER TABLE `article_tag`
  ADD CONSTRAINT `FK_919694F97294869C` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_919694F9BAD26311` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526C7294869C` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `FK_9474526CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `tag_article`
--
ALTER TABLE `tag_article`
  ADD CONSTRAINT `FK_300B23CC7294869C` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_300B23CCBAD26311` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
